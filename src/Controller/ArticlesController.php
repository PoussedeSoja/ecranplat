<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Commentaires;
use App\Form\CommentaireFormType;
use App\Form\EditProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticlesRepository;
use App\Repository\CommentairesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;


class ArticlesController extends AbstractController
{   
    
    /**
     * @Route("/", name="accueil")
     */
    public function article(): response
    {
        $articles = new Articles();
        $articles1 = new Articles();
        $articles2 = new Articles();
        $articles3 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles = $em0->getRepository("App\Entity\Articles")->findBy(
            array('section' => 'content'),
            array('date' => 'DESC'),
            1, 0
        );

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('section' => 'content'),
            array('date' => 'DESC'),
            20, 1
        );

        $articles2 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Films'),
            array('date' => 'DESC'),
            1, 0
        );

        $articles3 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Series'),
            array('date' => 'DESC'),
            1, 0
        );

        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,'articles1' => $articles1,'articles2' => $articles2,'articles3' => $articles3,
        ]);
    }
    
    /**
     * @Route("/films", name="films")
     */
    public function categorie(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Films'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/films.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/filmsnews", name="filmsnews")
     */
    public function souscategoriefilms(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Films', 'souscategorie' => 'News'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/filmsnews.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/filmsdossiers", name="filmsdossiers")
     */
    public function souscategoriefilms1(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Films', 'souscategorie' => 'Dossier'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/filmsdossiers.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/filmscritiques", name="filmscritiques")
     */
    public function souscategoriefilms2(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Films', 'souscategorie' => 'Critique'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/filmscritiques.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/series", name="series")
     */
    public function categorie1(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Series'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/series.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/seriesnews", name="seriesnews")
     */
    public function souscategorieseries(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Series', 'souscategorie' => 'news'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/seriesnews.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/seriesdossiers", name="seriesdossiers")
     */
    public function souscategorieseries1(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Series', 'souscategorie' => 'dossier'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/seriesdossiers.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/seriescritiques", name="seriescritiques")
     */
    public function souscategorieseries2(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Series', 'souscategorie' => 'critique'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/seriescritiques.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/jeuxvideo", name="jeuxvideo")
     */
    public function categorie2(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Jeux video'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/jeuxvideo.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/jeuxvideonews", name="jeuxvideonews")
     */
    public function souscategoriejeux(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Jeux video', 'souscategorie' => 'news'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/jeuxvideonews.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/jeuxvideodossiers", name="jeuxvideodossiers")
     */
    public function souscategoriejeux1(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Jeux video', 'souscategorie' => 'dossier'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/jeuxvideodossiers.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/jeuxvideotests", name="jeuxvideotests")
     */
    public function souscategoriejeux2(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Jeux video', 'souscategorie' => 'tests'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/jeuxvideotests.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/mangas", name="mangas")
     */
    public function categorie3(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'mangas'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/mangas.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/mangasnews", name="mangasnews")
     */
    public function souscategoriemangas(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'mangas', 'souscategorie' => 'news'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/mangasnews.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/mangasdossiers", name="mangasdossiers")
     */
    public function souscategoriemangas1(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'mangas', 'souscategorie' => 'dossier'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/mangasdossiers.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/mangascritiques", name="mangascritiques")
     */
    public function souscategoriemangas2(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'mangas', 'souscategorie' => 'critique'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/mangascritiques.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/bdlivres", name="bdlivres")
     */
    public function categorie4(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Bd/ livres'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/bdlivres.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/bdlivresnews", name="bdlivresnews")
     */
    public function souscategoriebd(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Bd/ livres', 'souscategorie' => 'news'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/bdlivresnews.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/bdlivresdossiers", name="bdlivresdossiers")
     */
    public function souscategoriebd1(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Bd/ livres', 'souscategorie' => 'dossier'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/bdlivresdossiers.html.twig', [
            'articles1' => $articles1,
        ]);
    }
    /**
     * @Route("/bdlivrescritiques", name="bdlivrescritiques")
     */
    public function souscategoriebd2(): response
    {
        $articles1 = new Articles();

        $em0 = $this->getDoctrine()->getManager();

        $articles1 = $em0->getRepository("App\Entity\Articles")->findBy(
            array('categorie' => 'Bd/ livres', 'souscategorie' => 'critique'),
            array('date' => 'DESC'),
        );
        
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        return $this->render('articles/bdlivrescritiques.html.twig', [
            'articles1' => $articles1,
        ]);
    }

    /** 
     * @Route("/articles/{id}", name="lire")
     * 
     */
    public function show(Articles $articles,Request $request, ArticlesRepository $repo, $id)
    {  
        $articles = $repo->find($id);
        $articles2 = $repo->find($id);
        $articles3 = $repo->find($id);

        // On instancie l'entité Commentaires
        $commentaire = new Commentaires();

        // Nous créons l'objet formulaire
        $form = $this->createForm(CommentaireFormType::class, $commentaire);

        // On récupère les données saisies
        $form->handleRequest($request);

        //On vérifie si le formulaire a été envoyé et si les données sont valides
        if($form->isSubmitted() && $form->isValid()){
            //Ici le formulaire a été envoyé et les données sont valides
            $commentaire->setArticles($articles);
            $commentaire->setDate(new \DateTime());

            //On instancie Doctrine
            $doctrine = $this->getDoctrine()->getManager();

            //On hydrate $commentaire
            $doctrine->persist($commentaire);

            //On écrit dans la base de données
            $doctrine->flush();
        }

        return $this->render('articles/lire.html.twig', [
            'articles' => $articles, 'articles2' => $articles2, 'articles3' => $articles3, 'commentForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/success", name="success")
     */
    public function success()
    {
        return $this->render('articles/success.html.twig', [

        ]);
    }

    /**
     * @Route("/error", name="error")
     */
    public function error()
    {
        return $this->render('articles/error.html.twig', [

        ]);
    }

    /**
     * @Route("/abonnement", name="abonnement")
     */
    public function showpaiement()
    {
        return $this->render('articles/abonnement.html.twig', [

        ]);
    }
    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        return $this->render('articles/test.html.twig', [

        ]);
    }
    /**
     * @Route("/profil", name="profil")
     */
    public function profil()
    {
        return $this->render('articles/profil.html.twig', [

        ]);
    }

    /**
     * @Route("/create-checkout-session", name="checkout")
     * 
     */
    
    public function showcheckout()
    {
        \Stripe\Stripe::setApiKey('sk_test_51HwT4JLo5hExdMh4KZFJTMN5mOwAnBB0UuqIOTluVzgxYdYSN1VTpc3soVdckG7Zaypj2pQcL64AABFq9pvRt20x001FLlDxyD');
        
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                  'name' => 'Abonnement 6 mois',
                ],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->generateUrl('success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('error', [], UrlGeneratorInterface::ABSOLUTE_URL),
          ]);
    
          return new JsonResponse([ 'id' => $session->id ]);
    }

    /**
     * @Route("/create-checkout-session1", name="checkout1")
     * 
     */
    
    public function showcheckout1()
    {
        \Stripe\Stripe::setApiKey('sk_test_51HwT4JLo5hExdMh4KZFJTMN5mOwAnBB0UuqIOTluVzgxYdYSN1VTpc3soVdckG7Zaypj2pQcL64AABFq9pvRt20x001FLlDxyD');
        
        $session1 = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                  'name' => 'Abonnement 1 an',
                ],
                'unit_amount' => 3500,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->generateUrl('success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('error', [], UrlGeneratorInterface::ABSOLUTE_URL),
          ]);
    
          return new JsonResponse([ 'id' => $session1->id ]);
    }

    /**
     * @Route("/create-checkout-session2", name="checkout2")
     * 
     */
    
    public function showcheckout2()
    {
        \Stripe\Stripe::setApiKey('sk_test_51HwT4JLo5hExdMh4KZFJTMN5mOwAnBB0UuqIOTluVzgxYdYSN1VTpc3soVdckG7Zaypj2pQcL64AABFq9pvRt20x001FLlDxyD');
        
        $session2 = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                  'name' => 'Abonnement 2 ans',
                ],
                'unit_amount' => 5000,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->generateUrl('success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('error', [], UrlGeneratorInterface::ABSOLUTE_URL),
          ]);
    
          return new JsonResponse([ 'id' => $session2->id ]);
    }

    /**
     * @Route("/profil/edition", name="editprofil")
     */

     public function editProfile(Request $request)
     {
         $user = $this->getUser();
         $form = $this->createForm(EditProfileType::class, $user);

         $form->handleRequest($request);

         if($form->isSubmitted() && $form->isValid()){
             $em = $this->getDoctrine()->getManager();
             $em->persist($user);
             $em->flush();

             $this->addFlash('message', 'Profil mis à jour');
             return $this->redirectToRoute('profil');

         }

         return $this->render('articles/editprofil.html.twig', [
             'editform' => $form->createView(),
         ]);
     }

    /**
     * @Route("/editpass", name="editpass")
     */

    public function editPass(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        if($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();

            // On vérifie si les deux mots de passe sont identiques
            if($request->request->get('password') == $request->request->get('password2')){
                $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('password')));
                $em->flush();
                $this->addFlash('message', 'Mot de passe modifié avec succes');

                return $this->redirectToRoute('profil');

            }else{
                $this->addFlash('error', 'Les deux mots de passe ne sont pas identiques');
            }
        }

        return $this->render('articles/editpass.html.twig');
        
    }

    

}

