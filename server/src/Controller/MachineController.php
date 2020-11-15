<?php

namespace App\Controller;

use App\Repository\MachineRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MachineController
{
    private $machineRepository;

    public function __construct(MachineRepository $machineRepository)
    {
        $this->machineRepository = $machineRepository;
    }



    /**
     * @Route("/machine/add", name="add_machine", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $brand = $data['brand'];
        $model = $data['model'];
        $manufacturer = $data['manufacturer'];
        $price = $data['price'];
        $images = $data['images'];

        if (empty($brand) || empty($model) || empty($manufacturer) || empty($price) || empty($images)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->machineRepository->saveMachine($brand, $model, $manufacturer, $price, $images);

        return new JsonResponse(['status' => 'Machine created!'], Response::HTTP_CREATED);
    }



    /**
     * @Route("/machine/{id}", name="get_one_machine", methods={"GET"})
     */

    public function get($id): JsonResponse
    {
        $machine = $this->machineRepository->findOneBy(['id' => $id]);

        $data = [
            'id' => $machine->getId(),
            'brand' => $machine->getBrand(),
            'model' => $machine->getModel(),
            'manufacturer' => $machine->getManufacturer(),
            'price' => $machine->getPrice(),
            'images' => $machine->getImages(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }



    /**
     * @Route("/machines", name="get_all_machines", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $machines = $this->machineRepository->findAll();
        $data = [];

        foreach ($machines as $machine) {
            $data[] = [
                'id' => $machine->getId(),
                'brand' => $machine->getBrand(),
                'model' => $machine->getModel(),
                'manufacturer' => $machine->getManufacturer(),
                'price' => $machine->getPrice(),
                'images' => $machine->getImages(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }



    /**
     * @Route("/machine/update/{id}", name="update_machine", methods={"PUT"})
     */
    public function update($id, Request $request): JsonResponse
    {
        $machine = $this->machineRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['brand']) ? true : $machine->setBrand($data['brand']);
        empty($data['model']) ? true : $machine->setModel($data['model']);
        empty($data['manufacturer']) ? true : $machine->setManufacturer($data['manufacturer']);
        empty($data['price']) ? true : $machine->setPrice($data['price']);
        empty($data['images']) ? true : $machine->setImages($data['images']);

        $updatedMachine = $this->machineRepository->updateMachine($machine);

        return new JsonResponse($updatedMachine->toArray(), Response::HTTP_OK);
    }



    /**
     * @Route("/machine/delete/{id}", name="delete_machine", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    {
        $machine = $this->machineRepository->findOneBy(['id' => $id]);

        $this->machineRepository->removeMachine($machine);

        return new JsonResponse(['status' => 'Machine deleted'], Response::HTTP_NO_CONTENT);
    }
}
