<?php

namespace App\Entity;

class ReservationEntity
{

	private  $reservationId;

	private  $course;

	private  $dateCreated;

	private  $amount;

	private  $discount;

	private  $finished;

	private  $calendarItems;
 

	public function __construct($course)
	{
		// TODO implement here
	}

	public function getCourse()
	{
		// TODO implement here
	}

	public function getAmount()
	{
		// TODO implement here
	}

	public function getDuration()
	{
		// TODO implement here
	}

	public function getAllItem()
	{
		// TODO implement here
	}

	public function rescheduleRerservation()
	{
		// TODO implement here
	}

	public function cancelAllItems()
	{
		// TODO implement here
	}

	public function getItem( $id)
	{
		// TODO implement here
	}

	public function addItem( $date,  $time)
	{
		// TODO implement here
	}

	public function removeItem( $id)
	{
		// TODO implement here
	}

	public function rescheduleItem( $id)
	{
		// TODO implement here
	}

	public function distributeDuration()
	{
		// TODO implement here
	}

	public function isFinished()
	{
		// TODO implement here
	}

	public function applyDiscount()
	{
		// TODO implement here
	}

}
