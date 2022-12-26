<?php

namespace App\Entity;

class CustomerEntity extends EmployeeEntity
{

	private  $customerId;

	private  $name;

	private  $lastName;

	private  $phone;

	private  $address;

	private  $loyaltyCard;

	private  $servicesAppointments;

	private  $courseReservation;








	public function __construct()
	{
		// ...
	}

	public function hasLoyaltyCard()
	{
		// TODO implement here
	}

	public function getId()
	{
		// TODO implement here
	}

	public function getAddress()
	{
		// TODO implement here
	}

	public function getPhone()
	{
		// TODO implement here
	}

	public function getFullName()
	{
		// TODO implement here
	}

}
