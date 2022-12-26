<?php

namespace App\Entity;

class SaleEntity extends ServiceEntity
{

	private  $saleId;

	private  $amount;

	private  $dateCreated;

	private  $finished;

	private  $saleDetails;

	private  $delivery;

	private  $cart;






	public function __construct()
	{
		// ...
	}

	public function getAmount()
	{
		// TODO implement here
	}

	public function isFinished()
	{
		// TODO implement here
	}

	public function finalizeSale()
	{
		// TODO implement here
	}

	public function getSaleId()
	{
		// TODO implement here
	}

	public function getAllProducts()
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

	public function setCart( $cart)
	{
		// TODO implement here
	}

	public function setDelivery( $delivery)
	{
		// TODO implement here
	}

	public function sendDelivery()
	{
		// TODO implement here
	}

}
