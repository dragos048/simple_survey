<?php
namespace App\SurveyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\SurveyBundle\Form\SurveyForm;
use App\SurveyBundle\Form\SurveySelectForm;
use App\SurveyBundle\Entity\SurveyEntity;
use Psr\Log\LoggerInterface;

class SurveyController extends AbstractController
{
    private $logger;
    
    /*
     * @params LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }
    
    /**
     * @Route("/survey")
     */
    
    /*
     * @params Request $request
     */
    public function showAction(Request $request)
    {
        $surveyEntity = new SurveyEntity();
        $form = $this->createForm(SurveyForm::class, $surveyEntity);
        $form->handleRequest($request);
        
        $entityManager = $this->getDoctrine()->getManager();
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $entityManager->persist($surveyEntity);
            $entityManager->flush();
            
            $this->logger->info('Water Survey has been saved!');
            
            return $this->render('thank_you.html.twig');
        }
        return $this->render('survey.html.twig', ['form_survey' => $form->createView()]);
    }
    
    /**
     * @Route("/survey/list")
     */
    
    /*
     * @params Request $request
     */
    public function listAction(Request $request)
    {
        $form = $this->createForm(SurveySelectForm::class);
        $form->handleRequest($request);
        
        $surveys = $this->getDoctrine()
            ->getRepository(SurveyEntity::class)
            ->findAll();
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            return $this->redirect('/survey/' . $form->getData()['survey_name']);
        }
        if (!$surveys) 
        {
            $this->logger->info('No surveys to display.');
            return $this->render('list.html.twig', ['message' => 'No surveys to display.', 'form_select' => $form->createView()]);
        }
        
        return $this->render('list.html.twig', ['surveys' => $surveys, 'form_select' => $form->createView()]);
    }
    
    /**
     * @Route("/survey/{name}")
     */
        
    /*
     * @params String $name
     */
    public function selectByNameAction($name)
    {      
        $survey = $this->getDoctrine()
        ->getRepository(SurveyEntity::class)
        ->findByName($name);

        if (!$survey) 
        {
            $this->logger->info('No survey to display.');
            return $this->render('list.html.twig', ['message' => 'No survey to display !!!']);
        }
        
        return $this->render('list.html.twig', ['surveys' => $survey]);
    }
}
