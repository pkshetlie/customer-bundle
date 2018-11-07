<?php

namespace CustomerBundle\Controller;

use CustomerBundle\Entity\Customer;
use CustomerBundle\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Customer controller.
 *
 */
class CustomerController extends Controller
{
    /**
     * Lists all customer entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $customers = $em->getRepository('CustomerBundle:Customer')->findAll();

        return $this->render('@Customer/customer/index.html.twig', array(
            'customers' => $customers,
        ));
    }

    /**
     * Creates a new customer entity.
     *
     */
    public function newAction(Request $request)
    {
        $customer = new Customer();
        return $this->editAction($request, $customer);
    }

    /**
     * Finds and displays a customer entity.
     *
     */
    public function showAction(Customer $customer)
    {
        $deleteForm = $this->createDeleteForm($customer);

        return $this->render('@Customer/customer/show.html.twig', array(
            'customer' => $customer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing customer entity.
     *
     */
    public function editAction(Request $request, Customer $customer)
    {
        $editForm = $this->createForm(CustomerType::class, $customer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->persist($customer);
            $this->getDoctrine()->getManager()->flush();
            $t = $this->get('translator');
            $this->addFlash('success', $t->trans('customer_bundle.success_edit_add'));
            return $this->redirectToRoute('customer_index');
        }

        return $this->render('@Customer/customer/edit.html.twig', array(
            'customer' => $customer,
            'form' => $editForm->createView()
        ));
    }

    /**
     * Deletes a customer entity.
     *
     */
    public function deleteAction(Request $request, Customer $customer)
    {
        $form = $this->createDeleteForm($customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($customer);
            $em->flush();
        }

        return $this->redirectToRoute('customer_index');
    }

}
