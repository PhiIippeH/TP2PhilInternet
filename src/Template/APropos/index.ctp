
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users','action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?> </li>
    </ul>
</nav>
	<style>

    h2,h3,p,a{
        text-align: center;
    }

    img{
        alignment: right;
    }

    body{
        text-align: right;
    }

	</style>


	<h2> Philippe Hétu</h2>
	<h3>420-4A4 MO Web et Bases de données.<br/>Hiver 2019, Collège Montmorency</h3>
	<p>Image de la vrai base de donnée PHP.</p>
    <body>
	<img src="webroot/img/APropos/Basededonnes.JPG" alt="Image de la vrai base de donnée"/><br/>
	<p>Image de la base de données original.
	<a href="http://www.databaseanswers.org/data_models/customers_and_addresses/index.htm">Lien vers le diagramme original</a>
	<br/>
	<img src="webroot/img/APropos/BDOriginal.PNG" alt="Image de la base de données original"/><br/><br/>

