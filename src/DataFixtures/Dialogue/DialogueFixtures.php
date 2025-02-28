<?php

namespace App\DataFixtures\Dialogue;

use App\Entity\Character\Npc;
use App\Entity\Dialogue\Dialogue;
use App\Entity\Quest\Quest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogueFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $dialogues = [
            // Sophie la Marchande
            [
                'type' => 'dialogue',
                'text' => "<p><em>C'est quand même un comble&nbsp;! Nous n'avons plus ni Roi, ni Prince&nbsp;! Mais qu'est-ce qui leur a pris de nous laisser tous seuls comme ça&nbsp;? Qu'est-ce qu'on va devenir, nous autres&nbsp;? Heureusement que les gardes sont toujours là…</em></p>",
                'effects' => [
                    'startQuest' => 'quest_main',
                ],
                'npc' => 'npc_sophie_la_marchande',
                'reference' => 'dialogue_sophie_la_marchande_1',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>J'ai hâte de terminer ma journée pour aller au temple&nbsp;! J'ai besoin de prier pour que tout ça se termine bien…</em></p>",
                'npc' => 'npc_sophie_la_marchande',
                'reference' => 'dialogue_sophie_la_marchande_rumor_1',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Dans le Quartier de la Vieille Ville, bien sûr&nbsp;! Vous n'avez pas vu la flèche du temple&nbsp;? C'est le plus grand bâtiment de la ville, en plein centre. Vous ne pouvez pas le manquer, il suffit de lever la tête.</em></p>",
                'npc' => 'npc_sophie_la_marchande',
                'reference' => 'dialogue_sophie_la_marchande_rumor_2',
            ],

            // Robert le Garde
            [
                'type' => 'dialogue',
                'text' => "<p><em>Bon. Là en ce moment, chus occupé. Chuis en service au cas où z'auriez point remarqué. Alors salut.</em></p>",
                'npc' => 'npc_robert_le_garde',
                'reference' => 'dialogue_robert_le_garde_1',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Il y a eu une \"bagarre\" à la taverne de la Flûte Moisie… Je sais pas si vous avez entendu parler de ça… Mais je vous conseille de pas trop traîner par là-bas à la nuit tombée… Cet endroit peut être dangereux. Vous feriez mieux de rester là où c'est sûr.</em></p>",
                'conditions' => [
                    'hasNoQuest' => 'quest_secondary_bagarre_bizarre',
                ],
                'npc' => 'npc_robert_le_garde',
                'reference' => 'dialogue_robert_le_garde_rumor_1',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Aux Docks de l'Ouest. C'est vers la mer. Ça s'appelle comme ça mais c'est au nord-est de la ville. Me demandez pas pourquoi, j'en sais rien. Chus point géographiste. Chuis garde.</em></p>",
                'conditions' => [
                    'hasNoQuest' => 'quest_secondary_bagarre_bizarre',
                ],
                'npc' => 'npc_robert_le_garde',
                'parent' => 'dialogue_robert_le_garde_rumor_1',
                'reference' => 'dialogue_robert_le_garde_rumor_2',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Qu'on aille pas dire que je vous avais pas prévenu… En même temps c'est bien et ça m'arrange. Mais si vous trouvez quoi que ce soit, je veux que vous veniez m'en parler avant de faire n'importe quoi&nbsp;! On est bien d'accord&nbsp;?</em></p>",
                'npc' => 'npc_robert_le_garde',
                'effects' => [
                    'startQuest' => 'quest_secondary_bagarre_bizarre',
                ],
                'parent' => 'dialogue_robert_le_garde_rumor_2',
                'reference' => 'dialogue_robert_le_garde_rumor_2_accept',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Hé ben, c'est point vos affaires de toute façon. Heureusement qu'y a encore des gardes dans c'te ville… Allez circulez&nbsp;!</em></p>",
                'npc' => 'npc_robert_le_garde',
                'parent' => 'dialogue_robert_le_garde_rumor_2',
                'reference' => 'dialogue_robert_le_garde_rumor_2_decline',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Il vous a dit quoi le tavernier&nbsp;? Allez, dites-moi&nbsp;! Faut quand même que je sache ce qui se passe dans ma ville…</em></p>",
                'npc' => 'npc_robert_le_garde',
                'conditions' => [
                    'hasQuest' => 'quest_secondary_bagarre_bizarre',
                ],
                'parent' => 'dialogue_robert_le_garde_rumor_1',
                'reference' => 'dialogue_robert_le_garde_rumor_2_accepted',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Bien joué. J'dois avouer que j'aurais pas misé un sou sur vous. Mais vous avez réussi. J'vous félicite. Et j'vous remercie. J'vais pouvoir me sortir ça de la tête.</em></p>",
                'npc' => 'npc_robert_le_garde',
                'conditions' => [
                    'completedQuest' => 'quest_secondary_bagarre_bizarre',
                ],
                'effects' => [
                    'rewardQuest' => 'quest_secondary_bagarre_bizarre',
                ],
                'parent' => 'dialogue_robert_le_garde_rumor_1',
                'reference' => 'dialogue_robert_le_garde_rumor_2_reward',
            ],

            // Bilo le Passant
            [
                'type' => 'dialogue',
                'text' => "<p><em>Le Roi Galdric a disparu depuis maintenant trois jours, et le Prince Alaric depuis une semaine et demi. Je ne sais pas ce qu'il y a au Donjon de l'Âme, mais si deux groupes de soldats en armes n'ont pas réussi à en ressortir, qui pourra bien nous aider&nbsp;?</em></p>",
                'effects' => [
                    'startQuest' => 'quest_main',
                ],
                'npc' => 'npc_bilo_le_passant',
                'reference' => 'dialogue_bilo_le_passant_1',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Vous avez entendu parler des rats qui envahissent les rues du Vieux Port&nbsp;? Il y en a partout&nbsp;! Et ils sortent même le jour maintenant… C’est inquiétant.</em></p>",
                'npc' => 'npc_bilo_le_passant',
                'conditions' => [
                    'hasNoQuest' => 'quest_secondary_des_rats_sur_les_docks',
                ],
                'reference' => 'dialogue_bilo_le_passant_rumor_1',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>C'est dans les Anciens Docks, au sud-est de la ville. C'est l'ancien quartier des pêcheurs et des marins, mais surtout des vieux qui se sont pas fait à la modernité des Docks de l'Ouest. C'est un endroit calme, mais avec ces rats, ça devient un peu plus animé… enfin, si on peut dire.</em></p>",
                'npc' => 'npc_bilo_le_passant',
                'conditions' => [
                    'hasNoQuest' => 'quest_secondary_des_rats_sur_les_docks',
                ],
                'parent' => 'dialogue_bilo_le_passant_rumor_1',
                'reference' => 'dialogue_bilo_le_passant_rumor_2',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Super&nbsp;! Enfin quelqu'un qui s'occupe des problèmes du peuple&nbsp;! C'est pas tous les jours qu'on voit ça. Merci, vraiment&nbsp;!</em></p>",
                'npc' => 'npc_bilo_le_passant',
                'effects' => [
                    'startQuest' => 'quest_secondary_des_rats_sur_les_docks',
                ],
                'parent' => 'dialogue_bilo_le_passant_rumor_2',
                'reference' => 'dialogue_bilo_le_passant_rumor_2_accept',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Oh, vous savez moi, ce que j'en dis… Si c'est le problème de personne, et que les gardes sont trop occupés, alors qui va s'en occuper de ces rats&nbsp;?</em></p>",
                'npc' => 'npc_bilo_le_passant',
                'parent' => 'dialogue_bilo_le_passant_rumor_2',
                'reference' => 'dialogue_bilo_le_passant_rumor_2_decline',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Alors, ces rats&nbsp;? Vous les avez vus&nbsp;? Vous avez fait quelque chose&nbsp;?</em></p>",
                'npc' => 'npc_bilo_le_passant',
                'conditions' => [
                    'hasQuest' => 'quest_secondary_des_rats_sur_les_docks',
                ],
                'parent' => 'dialogue_bilo_le_passant_rumor_1',
                'reference' => 'dialogue_bilo_le_passant_rumor_2_accepted',
            ],
            [
                'type' => 'rumor',
                'text' => "<p><em>Bravo&nbsp;! Vous avez réussi à vous débarrasser de ces rats&nbsp;! C'est un soulagement pour tout le monde. Merci pour votre aide. J'espère que vous ne vous êtes pas fait mordre trop fort…</em></p>",
                'npc' => 'npc_bilo_le_passant',
                'conditions' => [
                    'completedQuest' => 'quest_secondary_des_rats_sur_les_docks',
                ],
                'effects' => [
                    'rewardQuest' => 'quest_secondary_des_rats_sur_les_docks',
                ],
                'parent' => 'dialogue_bilo_le_passant_rumor_1',
                'reference' => 'dialogue_bilo_le_passant_rumor_2_reward',
            ],
        ];

        foreach($dialogues as $data) {
            $dialogue = new Dialogue();
            $dialogue->setType($data['type'])
                ->setText($data['text'])
                ->setParent(isset($data['parent']) ? $this->getReference($data['parent'], Dialogue::class) : null)
                ->setNpc($this->getReference($data['npc'], Npc::class));

            if(isset($data['conditions'])) {
                $dialogueConditions = [];
                foreach($data['conditions'] as $condition => $value) {
                    if($condition === 'hasNoQuest') {
                        $quest = $this->getReference($value, Quest::class);
                        $dialogueConditions['hasNoQuest'] = $quest->getId();
                    }
                    if($condition === 'hasQuest') {
                        $quest = $this->getReference($value, Quest::class);
                        $dialogueConditions['hasQuest'] = $quest->getId();
                    }
                    if($condition === 'completedQuest') {
                        $quest = $this->getReference($value, Quest::class);
                        $dialogueConditions['completedQuest'] = $quest->getId();
                    }
                }
                $dialogue->setConditions($dialogueConditions);
            }

            if(isset($data['effects'])) {
                $dialogueEffects = [];
                foreach($data['effects'] as $effect => $value) {
                    if($effect === 'startQuest') {
                        $quest = $this->getReference($value, Quest::class);
                        $dialogueEffects['startQuest'] = $quest->getId();
                    }
                    if($effect === 'rewardQuest') {
                        $quest = $this->getReference($value, Quest::class);
                        $dialogueEffects['rewardQuest'] = $quest->getId();
                    }
                }
                $dialogue->setEffects($dialogueEffects);
            }
            $manager->persist($dialogue);
            $this->addReference($data['reference'], $dialogue);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 35;
    }
}
