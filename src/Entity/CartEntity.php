<?php

namespace App\Entity;

class CartEntity
{

	private  $saleDetails;

	private  $total;





	public function __construct()
	{
		// ...
	}

	public function getAllProducts()
	{
		// TODO implement here
	}

	public function getTotal()
	{
		// TODO implement here
	}

	public function emptyCart()
	{
		// TODO implement here
	}

	public function addProduct( $product,  $quantity)
	{
		// TODO implement here
	}

	public function removeProduct( $productId)
	{
		// TODO implement here
	}

	public function setQuantity( $productId,  $quantity)
	{
		// TODO implement here
	}

	public function getQuantity( $productId)
	{
		// TODO implement here
	}

}
