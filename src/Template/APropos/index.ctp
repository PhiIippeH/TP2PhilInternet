
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users','action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?> </li>
    </ul>
</nav>
	<style>


    body{
        text-align: right;
    }

	</style>
	<h2> Philippe Hétu</h2>
	<h3>420-5B7 MO Applications internet.<br/>Automne 2019, Collège Montmorency</h3>
	<p>Image de la vrai base de donnée PHP.</p>
    <p>Utilisateur : admin@admin.com - Mot de passe : admin</p>
    <p>Utilisateur : SuperUtilisateur@SuperUtilisateur.com - Mot de passe : SuperUtilisateur</p>
    <p>Utilisateur : Utilisateur@Utilisateur.com - Mot de passe : Utilisateur</p>
    <p>Le but de l'application est de créer une adresse de livraison permettant la livraison de matériel avec sa photo
    et les coordonnées du destinataire/destinateur.
    </p>
    <p>L'utilisateur régulier sans avoir confirmé le email peut juste créer une adresse</p>
    <p>L'utilisateur régulier après avoir confirmé le email peut juste créer une adresse, faire un nouveau fichier
        et ajouter une descriptions de l'adresse</p>
    <p>L'administrateur peut tout faire</p>
    <p>Le visiteur peut voir</p>

    <body>
	<img src="webroot/img/APropos/Basededonnes.JPG" alt="Image de la vrai base de donnée"/><br/>
	<p>Image de la base de données original.
	<a href="http://www.databaseanswers.org/data_models/customers_and_addresses/index.htm">Lien vers le diagramme original</a>
	<br/>
	<img src="webroot/img/APropos/BDOriginal.PNG" alt="Image de la base de données original"/><br/><br/>

