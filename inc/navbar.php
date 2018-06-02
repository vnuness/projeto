
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Projeto CRUD</a>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item <?=navActive($page,"LISTA");?>">
        <a class="nav-link" href="lista.php">Listagem </a>
    </li>
    <li class="nav-item <?=navActive($page,"CADASTRO");?>">
        <a class="nav-link" href="cadastro.php">Cadastro</a>
    </li>
    <li class="nav-item <?=navActive($page,"EDITAR");?>">
        <a class="nav-link" href="editar.php">Editar</a>
    </li>
    </ul>
</div>
</nav>
