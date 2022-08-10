<?php
require 'config.php';

require_once 'classes/filmes.class.php';

$filmes = new Filmes($pdo);

$todosFilmes = $filmes->GetAll();

if (!empty($todosFilmes)) :
    foreach ($todosFilmes as $itens) :
?>
<fieldset>
    <strong><?php echo $itens->titulo ?></strong>
    <a href="votar.php?id=<?php echo $itens->idfilmes?>&voto=1"><img src="assets/image/star.png" height="20"/></a>
    <a href="votar.php?id=<?php echo $itens->idfilmes?>&voto=2"><img src="assets/image/star.png" height="20"/></a>
    <a href="votar.php?id=<?php echo $itens->idfilmes?>&voto=3"><img src="assets/image/star.png" height="20"/></a>
    <a href="votar.php?id=<?php echo $itens->idfilmes?>&voto=4"><img src="assets/image/star.png" height="20"/></a>
    <a href="votar.php?id=<?php echo $itens->idfilmes?>&voto=5"><img src="assets/image/star.png" height="20"/></a>
    (<?php echo round($itens->media,1) ?>)

</fieldset>
       <?php
    endforeach;
else:
    echo "Não existe Filmes Cadastrados";
endif;