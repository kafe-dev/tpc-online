<?php
/**
 * @project tpc-online
 * @author hoepjhsha
 * @email hiepnguyen3624@gmail.com
 * @date 23/12/2024
 * @time 14:15
 */

namespace App\Controller\Admin;

use App\Controller\BaseController;
use App\Entity\Setting;
use App\Form\Dashboard\SettingType;
use App\Repository\SettingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route(path: '/admin/setting', name: 'admin_setting_')]
//#[IsGranted('ROLE_ADMIN')]
class SettingController extends BaseController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route(path: '', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('admin/setting/index.html.twig', [
            'page_title' => 'Setting Management',
        ]);
    }

    #[Route(path: '/create', name: 'create', methods: ['GET', 'POST'])]
    public function createSetting(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();

            $name = $data['name'];
            $code = $data['code'];
            $values = explode(',', $data['values']);
            $data = [
                'type' => $data['type'],
                'values' => $values,
            ];

            $setting = new Setting();
            $setting->setName($name);
            $setting->setCode($code);
            $setting->setData($data);

            $this->em->persist($setting);
            $this->em->flush();

            $this->addFlash('success', 'Create setting success!');
            return $this->redirectToRoute('admin_setting_index');
        }

        $task = new Setting();
        $form = $this->createForm(SettingType::class, $task);

        return $this->render('admin/setting/create.html.twig', [
            'page_title' => 'Create Setting',
            'form' => $form->createView(),
        ]);
    }
}