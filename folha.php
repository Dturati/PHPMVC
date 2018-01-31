<?php
//  $transacao = ChaveTransacaoFolha::BENEFICIARIOSPENSAO;
if ($entidade->ID_FOLHA_BENEFICIARIO_PENSAO == 0) {
    $usuarioAutenticado->podeIncluir($transacao, true);
} else {
    $usuarioAutenticado->podeAlterar($transacao, true);
}