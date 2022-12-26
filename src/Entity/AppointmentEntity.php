<?php

namespace App\Entity;

class AppointmentEntity
{

	private  $appointmentId;

	private  $calendarItem;

	private  $appointmentType;

	private  $dateCreated;

	private  $amount;

	private  $discount;

	private  $finished;

	private  $services;








	public function __construct()
	{
		// ...
	}

	public function getAmount()
	{
		// TODO implement here
	}

	public function getDuration()
	{
		// TODO implement here
	}

	public function addService()
	{
		// TODO implement here
	}

	public function removeService()
	{
		// TODO implement here
	}

	public function getService()
	{
		// TODO implement here
	}

	public function getAllServices()
	{
		// TODO implement here
	}

	public function applyDiscount( $loyaltyCard)
	{
		// TODO implement here
	}

	public function setDate()
	{
		// TODO implement here
	}

	public function getDate()
	{
		// TODO implement here
	}

	public function setTime()
	{
		// TODO implement here
	}

	public function getTime()
	{
		// TODO implement here
	}

	public function isFinished()
	{
		// TODO implement here
	}

}
