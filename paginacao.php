<?php
function paginacao01($num,$total_reg)
{
// in�cio da segunda parte...
// 10 registros ou menos...
if ($num <= $total_reg)
{
    $total_paginas = 1;
}
// mais de 10 registros com valor m�ltiplo de 10...            
elseif ($num % $total_reg == 0){
    $total_paginas = $num / $total_reg;
}
// mais de 10 registros por�m o valor n�o � m�ltiplo de 10...
else {
    // como a divis�o n�o � exata, teremos que subtrair a parte que n�o � inteira e
    // acrescentar 1 p�gina.
    $total_paginas = ($num / $total_reg) - (($num % $total_reg) / $total_reg) + 1;
}

return $total_paginas;
// fim da segunda parte...
}

function paginacao02($total_paginas,$pagina,$link,$var){
//Inicio do Script dos n�meros da pagina��o

// se estivermos na primeira p�gina, o link "anterior" n�o precisa linkar nada...
if ($pagina == 1) {
    echo "<span style='color:#ccc;font-weight:bold;font-size:16'><< anterior</span>";
}
// do contr�rio, linka a p�gina anterior...
else {
    echo "<a style='color:#050;font-weight:bold;font-size:16' href='$link?pagina=".($pagina - 1)."&$var'><< anterior </span>";
}

// gerando os n�meros com os respectivos links...
$i = 1;
while ($i <= $total_paginas) {
    // a p�gina atual n�o precisa ser linkada...
    if ($i == $pagina) {
        echo " <span style='color:red;font-weight:bold;font-size:26'>$i</span>";
    }
    // as demais p�ginas deve ser linkadas...
    else {
        echo "<a style='color:#050;font-weight:bold;font-size:16' href=".$link.'&pagina='.$i.'>'.$i.'</a>';
    }
    $i = $i + 1;
}

// se estivermos na �ltima p�gina, o link "pr�ximo" n�o precisa linkar nada...                
if ($pagina == $total_paginas) {
    echo "<span style='color:#ccc;font-weight:bold;font-size:16'> pr&oacute;xima >></span>";
}
// do contr�rio, linka a pr�xima p�gina...
else {
    echo "<a style='color:#050;font-weight:bold;font-size:16' href=\"$link?pagina=".($pagina + 1)."&$var\"> proxima >></a></font>";
}
//Fim da numera��o da pagina��o
}
?>
