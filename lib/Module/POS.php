<?php
/**
 * POS Module
 */

namespace App\Module;

class POS extends \OpenTHC\Module\Base
{
	function __invoke($a)
	{
		$a->get('', 'App\Controller\POS\Home');
		$a->get('/fast', 'App\Controller\POS\Fast');

		$a->map(['GET', 'POST'], '/ajax', 'App\Controller\POS\Ajax');

		$a->post('/checkout/commit', 'App\Controller\POS\Checkout\Commit');
		$a->get('/checkout/done', 'App\Controller\POS\Checkout\Done');
		$a->map(['GET', 'POST'], '/checkout/receipt', 'App\Controller\POS\Checkout\Receipt');

		$a->post('/cart/ajax', 'App\Controller\POS\Cart\Ajax');
		//$a->post('/cart/drop', 'App\Controller\POS\Cart\Drop');
		$a->post('/cart/drop', function($REQ, $RES, $ARG) {
			return $RES->withRedirect('/pos');
		});
		$a->post('/cart/save', 'App\Controller\POS\Cart\Save');

	}

}
