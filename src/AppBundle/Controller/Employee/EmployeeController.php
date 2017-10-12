<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 12/10/2017
 * Time: 23:50
 */

namespace AppBundle\Controller\Employee;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class EmployeeController extends Controller
{
    /**
     * @Route("/employee/add", name="add_employee")
     */
    public function addEmployeeAction(Request $request)
    {
        return $this->render('employee/add_employee.html.twig', ['title'=>'New Employee']);
    }

}