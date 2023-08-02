@extends('layouts.app')

@section('content')


<header class="header">
    <div class="header-overlay">
        <div class="search-box">
            <h1 style="color: white">Posez-nous vos questions !</h1>
            <form>
                <div class="search-container01">
                    <div ><i class="fas fa-search"></i></div>
                    <input type="text" class="search-input01" placeholder="Recherche">
                </div>
            </form>
        </div>
    </div>
</header>
<section class="container-horizontal01">
    <div class="horizontal-section01">
        <div class="text-embeded">
            <h5>Articles à la une</h5><br>
            <h6 style="color: #ff040c">Comment sont protégées les données chez Flatlooker ?</h6> <hr>
		</div> 
		<div class="text-embeded">
			<h5></h5><br>
            <br><h6 style="color: #ff040c">Où trouver les informations pour remplir ma déclaration d'impôts / revenus fonciers ?</h6><hr>
		</div> 
       
		<div class="text-embeded">
			<h5></h5><br>
            <br><h6 style="color: #ff040c">Puis-je me rétracter suite à la signature d'un mandat de gestion locative ?</h6><hr>
        
		</div>
    </div>
</section>
<section id="main" >
	<div class="nav justify-content-center" style="color: black">
           <h2> <a href="locataire-link" class="nav-link active">Je suis locataire</a><br></h2>
            <h2><a href="proprietaire-link" class="nav-link active">Je suis propriétaire</a></h2>
    </div>
		<hr>
	<div id="locataire-questions" class="question-section" class="d-flex d-lg-block">
			<div class="question-block" >
				<h3 style=" background-position: center;">Informations sur mon appartement</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3 style=" background-position: center;">Incident</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3>Sinistre</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3>Rétractation</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3>Etat des lieux</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c" > Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3>Clés / Digicode</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3>Immeuble</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3>Paiements</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3>Charges</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3>Aménagements du locataire</h3>
				<h6><a href="#" style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#" style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
			<div class="question-block">
				<h3>Administratif</h3>
				<h6><a href="#"style="color: #ff040c">Quel loyer pour mon PINEL en 2020 et quelles sont les conditions de revenus ?</a><br>
                    <a href="#"style="color: #ff040c">Je suis propriétaire, que se passe-t-il une fois que mon locataire est entré dans les lieux ?</a><br>
                    <a href="#" style="color: #ff040c"> Comment mettre un complément loyer à Paris ?</a></h6>
                    <a href="voir tous les articles" style="text-decoration:none; color:#ff040c">voir tous les articles</a>
			</div>
		</div>
		<div id="proprietaire-questions" class="question-section">
			<div class="question-block">
				<h3>Question 1</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			</div>
			<div class="question-block">
				<h3>Question 2</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			</div>
			<div class="question-block">
				<h3>Question 3</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	</div>
		
  </section>

@endsection