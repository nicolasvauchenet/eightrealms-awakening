<?php

namespace App\Form\Character;

use App\Entity\Character\Player;
use App\Entity\Character\Profession;
use App\Entity\Character\Race;
use App\Repository\Character\ProfessionRepository;
use App\Repository\Character\RaceRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('race', EntityType::class, [
                'required' => true,
                'label' => 'Race',
                'class' => Race::class,
                'choice_label' => 'name',
                'query_builder' => function(RaceRepository $raceRepository) {
                    return $raceRepository->createQueryBuilder('r')
                        ->where('r.playable = :playable')
                        ->setParameter('playable', true)
                        ->orderBy('r.name', 'ASC');
                },
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('profession', EntityType::class, [
                'required' => true,
                'label' => 'Profession',
                'class' => Profession::class,
                'choice_label' => 'name',
                'query_builder' => function(ProfessionRepository $professionRepository) {
                    return $professionRepository->createQueryBuilder('p')
                        ->where('p.playable = :playable')
                        ->setParameter('playable', true)
                        ->orderBy('p.name', 'ASC');
                },
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'autofocus' => true,
                ],
            ])
            ->add('picture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Image',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-file',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Il faut choisir une image JPG, PNG ou WebP',
                        'maxSizeMessage' => 'Le fichier est trop lourd',
                    ]),
                ],
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'label' => 'Histoire',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
