importScripts('/workbox/workbox-sw.js');
workbox.setConfig({modulePathPrefix: '/workbox'});const cache_0_0 = new workbox.strategies.CacheFirst({
  cacheName: 'assets',plugins: [new workbox.expiration.ExpirationPlugin({"maxEntries":968,"maxAgeSeconds":31536000})]
});
workbox.routing.registerRoute(({url}) => url.pathname.startsWith('/assets'),cache_0_0);
self.addEventListener('install', event => {
  const done = ["/assets/@spomky-labs/pwa-bundle/sync-broadcast_controller-2-cTsg3.js","/assets/@spomky-labs/pwa-bundle/prefetch-on-demand_controller-e2Rt_GG.js","/assets/@spomky-labs/pwa-bundle/backgroundsync-form_controller-ynS5Onz.js","/assets/@spomky-labs/pwa-bundle/connection-status_controller-6uY2aFO.js","/assets/@symfony/ux-live-component/live.min-ZJB0GOL.css","/assets/@symfony/ux-live-component/live_controller-ZPUcqp6.js","/assets/@symfony/ux-turbo/turbo_stream_controller-k6A1X0A.js","/assets/@symfony/ux-turbo/turbo_controller-zl4y2v3.js","/assets/@symfony/stimulus-bundle/controllers-4g7Ye3r.js","/assets/@symfony/stimulus-bundle/loader-kxG46ja.js","/assets/bootstrap-lMx7M99.js","/assets/img/core/cover-lzFe5t8.webp","/assets/img/core/spell/shield-i8YJTqK.png","/assets/img/core/spell/health-Tt5YR25.png","/assets/img/core/spell/fire-tSLVFuk.png","/assets/img/core/spell/illusion-tijsdZV.png","/assets/img/core/spell/weapon-4bcnoXV.png","/assets/img/core/spell/water-Y1bO1rs.png","/assets/img/core/spell/nature-OxfSS06.png","/assets/img/core/spell/mana-wpPxhbA.png","/assets/img/core/spell/restoration-Bb8Z7hV.png","/assets/img/core/spell/metamorphosis-BTxRWB4.png","/assets/img/core/spell/storm-rQI3myS.png","/assets/img/core/location/encounter-montagne-zojNMZY.webp","/assets/img/core/location/arcanes_thumb-kz3cnfZ.webp","/assets/img/core/location/encounter-foret-p9lAM_-.webp","/assets/img/core/location/temple_thumb-92JCPBp.webp","/assets/img/core/location/encounter-ville-Ir2AzPt.webp","/assets/img/core/location/grotte_thumb-LoGed91.webp","/assets/img/core/location/tunnel_thumb---haLy3.webp","/assets/img/core/location/encounter-plaine-QImLcoa.webp","/assets/img/core/location/maison_thumb-w34BrSP.webp","/assets/img/core/location/encounter-plage-zLKWSxC.webp","/assets/img/core/location/taverne_thumb-FogHQm8.webp","/assets/img/core/location/encounter-desert-QLa1_FE.webp","/assets/img/core/location/forge_thumb-vDisgf6.webp","/assets/img/core/creature/fantome_thumb-h3x214Z.png","/assets/img/core/creature/ours-cendre_thumb-rCWTNwj.png","/assets/img/core/creature/gobelin-chef-QVnqLUl.png","/assets/img/core/creature/gobelin-chef_book-0rF5tYr.png","/assets/img/core/creature/harpie-des-cimes_book-WG-mn93.png","/assets/img/core/creature/gobelin-chef_thumb-VlSOMJp.png","/assets/img/core/creature/fantome_book-2YKh9tR.png","/assets/img/core/creature/sanglier-noir_thumb-cYZoEqg.png","/assets/img/core/creature/bouquetin-feroce_book-tLdAepY.png","/assets/img/core/creature/squelette-de-marin_thumb-jTCo6oI.png","/assets/img/core/creature/ours-cendre_book-FDUEOpG.png","/assets/img/core/creature/harpie-des-cimes_thumb-V9_TgqL.png","/assets/img/core/creature/ame-en-peine_thumb-MfzggCi.png","/assets/img/core/creature/loup_thumb-i2q1awl.png","/assets/img/core/creature/gobelin-chef_alt-s-jJ7Yb.png","/assets/img/core/creature/gobelin-guerrier_book-OW_kUx7.png","/assets/img/core/creature/corbeau-des-brumes_book-za1bRIz.png","/assets/img/core/creature/gros-rat_book-4KuRt1X.png","/assets/img/core/creature/sirene-melancolique_thumb-fehotNV.png","/assets/img/core/creature/ame-en-peine_book--NEHBfG.png","/assets/img/core/creature/squelette-guerrier_book-Dv0EMEv.png","/assets/img/core/creature/squelette-de-marin_book-945cew0.png","/assets/img/core/creature/rat-geant_book-Y5bIOom.png","/assets/img/core/creature/dragon-de-pierre-fqJL4vK.png","/assets/img/core/creature/rat-geant_thumb-2n_nlM_.png","/assets/img/core/creature/sirene-melancolique-QRwZSLZ.png","/assets/img/core/creature/gobelin-guerrier_thumb-SO6ajWV.png","/assets/img/core/creature/squelette-deryl_thumb-j9mtZwI.png","/assets/img/core/creature/dragon-de-pierre_book-uEnBPdT.png","/assets/img/core/creature/bouquetin-feroce_thumb-KJgA6p6.png","/assets/img/core/creature/sirene-melancolique-angry-BYxEM27.png","/assets/img/core/creature/gobelin-eclaireur_thumb-jN_6lD9.png","/assets/img/core/creature/dragon-de-pierre_thumb-m0Sh0nM.png","/assets/img/core/creature/squelette-deryl-NIxXd_-.png","/assets/img/core/creature/sanglier-noir_book-L4biEjV.png","/assets/img/core/creature/sirene_book-cX1g0KH.png","/assets/img/core/creature/gros-rat_thumb-_1-2jf-.png","/assets/img/core/creature/gobelin-eclaireur_book-srIZtU0.png","/assets/img/core/creature/loup_book-_Rhi-K-.png","/assets/img/core/action/rumor-akx3v9z.png","/assets/img/core/action/sing-4lvvDob.png","/assets/img/core/action/cast-4uN1hi3.png","/assets/img/core/action/decline-CN5g6bK.png","/assets/img/core/action/fist-E5BXUy-.png","/assets/img/core/action/talk-vYPM1M5.png","/assets/img/core/action/spell-wpPxhbA.png","/assets/img/core/action/sleep-62Egdwp.png","/assets/img/core/action/steal-XAENOYV.png","/assets/img/core/action/search-KBBFYMw.png","/assets/img/core/action/pray-JJHV88C.png","/assets/img/core/action/angry-ff14453.png","/assets/img/core/action/test-3yiVzWE.png","/assets/img/core/action/flee-Ync3Zi5.png","/assets/img/core/action/walk-FcscdKC.png","/assets/img/core/action/attack-euH26-x.png","/assets/img/core/action/exit-B82j_hX.png","/assets/img/core/action/accept-CrWniUr.png","/assets/img/core/action/trade-yfAoKya.png","/assets/img/core/action/leave-1sobBHn.png","/assets/img/core/action/reload-6Cu9FAq.png","/assets/img/core/action/repair-43y-6Oa.png","/assets/img/core/logo-tYcpRbY.png","/assets/img/core/item/shield/shield_iron-_pT2TfG.png","/assets/img/core/item/shield/shield_steel_enchanted-cYqBbKb.png","/assets/img/core/item/shield/shield_steel-4cgzDgT.png","/assets/img/core/item/shield/shield_wood-ajaAQ6W.png","/assets/img/core/item/shield/shield_iron_enchanted-JfnxFG9.png","/assets/img/core/item/shield/shield_wood_enchanted-A-xifO2.png","/assets/img/core/item/weapon/croc-daskalor-YJRO4Th.png","/assets/img/core/item/weapon/ax_war_enchanted-egNRihm.png","/assets/img/core/item/weapon/bow_short-iTCThrz.png","/assets/img/core/item/weapon/bow_long-UFrUipB.png","/assets/img/core/item/weapon/dagger-vvCFuos.png","/assets/img/core/item/weapon/sword_long-jp7e9xR.png","/assets/img/core/item/weapon/sword_short-BwwhlUJ.png","/assets/img/core/item/weapon/hammer_war_enchanted-MemaRgH.png","/assets/img/core/item/weapon/ax_war-PbTfRGg.png","/assets/img/core/item/weapon/gun-D3xpkUI.png","/assets/img/core/item/weapon/hammer_war-MyHUiau.png","/assets/img/core/item/weapon/magical_wand-1OqVFvU.png","/assets/img/core/item/weapon/sword_long_enchanted-Nw70I1S.png","/assets/img/core/item/weapon/magical_stick-BdE1j0R.png","/assets/img/core/item/weapon/dagger_enchanted-eWikZmO.png","/assets/img/core/item/weapon/fight-stick-Ep1ZTF6.png","/assets/img/core/item/weapon/sword_short_enchanted-JKGRJhY.png","/assets/img/core/item/weapon/bow_short_enchanted-afygIfm.png","/assets/img/core/item/weapon/pickaxe-7iu3h35.png","/assets/img/core/item/weapon/bow_long_enchanted-nqgNY4c.png","/assets/img/core/item/scroll/scroll-8u0DLwK.png","/assets/img/core/item/gift/flowers-n4J-OKh.png","/assets/img/core/item/gift/ring_gold-itEEBGa.png","/assets/img/core/item/gift/ring_silver-39xAuHT.png","/assets/img/core/item/gift/ring_copper-WlIGuA9.png","/assets/img/core/item/amulet/amulette-du-cercle-anVAx--.png","/assets/img/core/item/amulet/coeur-decume-wMzAx2l.png","/assets/img/core/item/amulet/medaillon-des-vents-a2Kdx-_.png","/assets/img/core/item/amulet/amulet-fi7Lhha.png","/assets/img/core/item/map/desert-nWNyyzj.png","/assets/img/core/item/map/city-yv3LUUE.png","/assets/img/core/item/map/forest-0EXaTeZ.png","/assets/img/core/item/map/realm-tuz5Kmb.png","/assets/img/core/item/map/mountain-DBuhWgT.png","/assets/img/core/item/map/village-xBtBOQV.png","/assets/img/core/item/map/dungeon-T5ZJznk.png","/assets/img/core/item/armor/armor_iron-T4X82Rj.png","/assets/img/core/item/armor/armor_robe_druid-TqgFK2R.png","/assets/img/core/item/armor/armor_robe_mage-y-6iXaH.png","/assets/img/core/item/armor/armor_robe_druid_enchanted-aaYko2H.png","/assets/img/core/item/armor/armor_robe_mage_enchanted--3THUze.png","/assets/img/core/item/armor/armor_steel_enchanted-jfv5bhN.png","/assets/img/core/item/armor/armor_iron_enchanted-4pdbdfr.png","/assets/img/core/item/armor/armor_plates_enchanted-AEgluv9.png","/assets/img/core/item/armor/armor_steel-Z5JFNmI.png","/assets/img/core/item/armor/armor_leather_enchanted-SgJygQ5.png","/assets/img/core/item/armor/armor_leather-oZcA4aZ.png","/assets/img/core/item/armor/armor_plates-q80AQpS.png","/assets/img/core/item/food/food_bread-C4Xa5Ie.png","/assets/img/core/item/food/food_chicken-O7qjSEt.png","/assets/img/core/item/food/food_wine-ej9OrYw.png","/assets/img/core/item/food/food_meat-7iTtK7K.png","/assets/img/core/item/food/food_beer-kyZpVPm.png","/assets/img/core/item/food/food_cheese-d9YmXdJ.png","/assets/img/core/item/food/food_fish-nggB_-G.png","/assets/img/core/item/book/book_author-ykNdOQI.png","/assets/img/core/item/book/book_diary-woSFfv2.png","/assets/img/core/item/book/book_letter-tl_LwAY.png","/assets/img/core/item/ring/ring-Ix40V6l.png","/assets/img/core/item/potion/potion_health-FpdTRH7.png","/assets/img/core/item/potion/potion_util-bnGZWFx.png","/assets/img/core/item/potion/potion_mana-B6J-4SA.png","/assets/img/core/item/potion/potion_broken-zVOJKHJ.png","/assets/img/core/screen/jail-rlerGyx.webp","/assets/img/core/reward/chest-z-3RKA-.png","/assets/img/core/reward/royal_box-oOichFD.png","/assets/img/core/reward/gift-TCqEIWq.png","/assets/img/core/pregenerated/lyra-lagile-wSH-QrF.png","/assets/img/core/pregenerated/eryndor-le-vigilant-doQX_4t.png","/assets/img/core/pregenerated/tharasha-la-sauvage_thumb-mO-gotU.png","/assets/img/core/pregenerated/isilea-la-gardienne-to4dcU1.png","/assets/img/core/pregenerated/lyra-lagile_thumb-HzISITf.png","/assets/img/core/pregenerated/elandra-la-sage_thumb-Z-CsiP1.png","/assets/img/core/pregenerated/tharasha-la-sauvage-LcveKLq.png","/assets/img/core/pregenerated/grymm-le-bricoleur_thumb-kgd_2Zt.png","/assets/img/core/pregenerated/thorin-le-feroce-L5LeoOv.png","/assets/img/core/pregenerated/isilea-la-gardienne_thumb-kc8mmbN.png","/assets/img/core/pregenerated/eryndor-le-vigilant_thumb-CvfyLIE.png","/assets/img/core/pregenerated/grymm-le-bricoleur-yLYS7zV.png","/assets/img/core/pregenerated/aldrin-le-brave-efCOpzD.png","/assets/img/core/pregenerated/thorin-le-feroce_thumb-gHTNZXG.png","/assets/img/core/pregenerated/elandra-la-sage-hXFtl3e.png","/assets/img/core/pregenerated/aldrin-le-brave_thumb-27ctfbO.png","/assets/img/core/cover_documentation-FyZ1KQK.png","/assets/img/core/equipment/bow-39XEcaM.png","/assets/img/core/equipment/anneau-es2ySqN.png","/assets/img/core/equipment/nourriture-1N8Q_kU.png","/assets/img/core/equipment/bouclier-nqN-mm-.png","/assets/img/core/equipment/shield-nqN-mm-.png","/assets/img/core/equipment/carte-LTnTkzv.png","/assets/img/core/equipment/potion-4vXtQlD.png","/assets/img/core/equipment/inventory-2RsMM5s.png","/assets/img/core/equipment/divers-nZKYRSA.png","/assets/img/core/equipment/armure-0A4uWS6.png","/assets/img/core/equipment/cadeau-a1AcvQq.png","/assets/img/core/equipment/armor-0A4uWS6.png","/assets/img/core/equipment/parchemin-AG898Ol.png","/assets/img/core/equipment/equipment-z0RkGvG.png","/assets/img/core/equipment/ring-es2ySqN.png","/assets/img/core/equipment/livre-JHvRV9_.png","/assets/img/core/equipment/sword-f9ACnDX.png","/assets/img/core/equipment/arme-magique-lqs1jVV.png","/assets/img/core/equipment/arme-f9ACnDX.png","/assets/img/core/equipment/amulette-Qdm4dWB.png","/assets/img/core/equipment/arc-39XEcaM.png","/assets/img/core/equipment/scroll-AG898Ol.png","/assets/img/core/equipment/amulet-Qdm4dWB.png","/assets/img/core/npc/druide-NPaZTKp.png","/assets/img/core/npc/sbire-9gZBr-i.png","/assets/img/core/npc/chef-malfrat-Ad1mVMs.png","/assets/img/core/npc/nain-mineur-IJwxzHN.png","/assets/img/core/npc/nain-mineur_thumb-E51_jMO.png","/assets/img/core/npc/grand-druide-eEmCTSj.png","/assets/img/core/npc/chef-malfrat_thumb-gLlZvi8.png","/assets/img/core/npc/grand-druide_thumb-a4mkm_E.png","/assets/img/core/npc/sbire_thumb-gomh5c8.png","/assets/img/core/npc/druide_thumb-dp9xxtW.png","/assets/img/chapter1/combat/port-saint-doux-une-bande-de-rats-sur-les-docks-5iu_UA7.webp","/assets/img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge-Z0W4OI-.png","/assets/img/chapter1/combat/bois-du-pendu-druides-de-la-clairiere_thumb-dp9xxtW.png","/assets/img/chapter1/combat/bois-du-pendu-gerome-Cp_yCHk.webp","/assets/img/chapter1/combat/port-saint-doux-une-bande-de-rats-sur-les-docks_thumb-_1-2jf-.png","/assets/img/chapter1/combat/plage-de-la-sirene-squelettes-marins_thumb-j9mtZwI.png","/assets/img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge_thumb-2n9EnOS.png","/assets/img/chapter1/combat/plage-de-la-sirene-squelettes-marins-cOHHWpx.png","/assets/img/chapter1/combat/bois-du-pendu-druides-de-la-clairiere-wfBEDYr.webp","/assets/img/chapter1/combat/plouc-eclaireurs-gobelins-48kZiJG.webp","/assets/img/chapter1/combat/bois-du-pendu-druides-du-bosquet_thumb-3gjmBtt.png","/assets/img/chapter1/combat/bois-du-pendu-druides-du-bosquet-yPy8qjU.webp","/assets/img/chapter1/combat/plouc-eclaireurs-gobelins_thumb-GHo__eZ.png","/assets/img/chapter1/combat/plouc-campement-gobelin--ZL48qr.webp","/assets/img/chapter1/combat/bois-du-pendu-gerome_thumb-WKSzob1.png","/assets/img/chapter1/combat/plouc-campement-gobelin_thumb-GtBgzs9.png","/assets/img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks-9Nl3lYN.webp","/assets/img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks_thumb-2n_nlM_.png","/assets/img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge-ognqCfU.webp","/assets/img/chapter1/location/maison-de-gerard-le-pecheur-vZqo__S.webp","/assets/img/chapter1/location/le-tunnel-de-bardin-zsLhpVq.webp","/assets/img/chapter1/location/rocher-du-dragon-ZfuNmxH.webp","/assets/img/chapter1/location/jardins-de-la-mairie-9DjiA9V.webp","/assets/img/chapter1/location/salle-du-miroir-CnbGXDA.webp","/assets/img/chapter1/location/nuit_docks-de-louest-B4Kct_L.webp","/assets/img/chapter1/location/palais-royal-kl6q0z7.webp","/assets/img/chapter1/location/sables-chauds-kS8yY4V.webp","/assets/img/chapter1/location/refuge-du-bouc-boiteux-BMJ9mlC.webp","/assets/img/chapter1/location/crypte-inversee-QWPAOC-.webp","/assets/img/chapter1/location/la-grotte-OuBAZ3p.webp","/assets/img/chapter1/location/camp-abandonne-sd3-M93.webp","/assets/img/chapter1/location/tombeau-de-galdric-premier-iL3-JKA.webp","/assets/img/chapter1/location/bois-des-relents-cqC4h6r.webp","/assets/img/chapter1/location/nouvelle-ville-6elzf1X.webp","/assets/img/chapter1/location/antichambre-du-roi-by_Dl_g.webp","/assets/img/chapter1/location/bois-du-pendu-NQgE-Fi.webp","/assets/img/chapter1/location/bosquet-des-druides-KSZ8jtx.webp","/assets/img/chapter1/location/grotte-des-echos-wKNqtp4.webp","/assets/img/chapter1/location/palais-royal_thumb-Vp838m3.webp","/assets/img/chapter1/location/quartier-des-chauves-bhqRoaC.webp","/assets/img/chapter1/location/forge-de-port-saint-doux-rZ7yP40.webp","/assets/img/chapter1/location/hotel-de-ville_thumb-41TRWJb.webp","/assets/img/chapter1/location/le-refuge_alt-B4uy_KV.webp","/assets/img/chapter1/location/donjon-de-l-ame_thumb-IeSrPhB.webp","/assets/img/chapter1/location/quartier-du-marche-XWiCGD2.webp","/assets/img/chapter1/location/temple-de-port-saint-doux-tdQITMH.webp","/assets/img/chapter1/location/quartier-des-ploucs-2658hJR.webp","/assets/img/chapter1/location/hall-dentree-Ep4WQNO.webp","/assets/img/chapter1/location/le-refuge-e2CpWZJ.webp","/assets/img/chapter1/location/monts-terribles-CipvVK3.webp","/assets/img/chapter1/location/campement-gobelin_thumb-pAWmTBN.webp","/assets/img/chapter1/location/entree-du-donjon-VAZ-UMe.webp","/assets/img/chapter1/location/salle-des-chaines-avNDmG9.webp","/assets/img/chapter1/location/jardins-de-la-mairie_thumb-b9ElRiY.webp","/assets/img/chapter1/location/gouffre-daskalor-9XSQPy1.webp","/assets/img/chapter1/location/taverne-de-la-flute-moisie-6ViPk98.webp","/assets/img/chapter1/location/maison-de-gerard-le-pecheur_alt-1EayrxT.webp","/assets/img/chapter1/location/entree-du-donjon_alt-mHXLHyL.webp","/assets/img/chapter1/location/port-saint-doux-E_HUf5A.webp","/assets/img/chapter1/location/royaume-de-lile-du-nord-B9FJXJA.webp","/assets/img/chapter1/location/col-du-vent-noir-GKGSD11.webp","/assets/img/chapter1/location/campement-gobelin_alt-iBBTmRp.webp","/assets/img/chapter1/location/hotel-de-ville_alt-05RQkec.webp","/assets/img/chapter1/location/oasis-sans-nom-GFBo9go.webp","/assets/img/chapter1/location/docks-de-louest-i_uOuPi.webp","/assets/img/chapter1/location/arcanes-de-port-saint-doux-bQJQc2t.webp","/assets/img/chapter1/location/plouc-t1fVONa.webp","/assets/img/chapter1/location/quartier-des-ploucs_alt-5oQ0Cpe.webp","/assets/img/chapter1/location/anciens-docks-AVaHd-z.webp","/assets/img/chapter1/location/la-chambre-du-rituel-CIYp4z3.webp","/assets/img/chapter1/location/appartements-royaux-6fqxAiG.webp","/assets/img/chapter1/location/oree-du-bois-3hVGQG-.webp","/assets/img/chapter1/location/campement-gobelin-UzFMf7C.webp","/assets/img/chapter1/location/plage-de-la-sirene-uN6tE9-.webp","/assets/img/chapter1/location/plouc_alt-t1fVONa.webp","/assets/img/chapter1/location/quartier-du-marche_alt-RoEaK8N.webp","/assets/img/chapter1/location/le-gouffre-xW42tJk.webp","/assets/img/chapter1/location/clairiere-de-loublie-Y8E9HI2.webp","/assets/img/chapter1/location/appartements-royaux_thumb-UiGqdnM.webp","/assets/img/chapter1/location/donjon-de-l-ame-u6ALy5T.webp","/assets/img/chapter1/location/hotel-de-ville-mQhIv7w.webp","/assets/img/chapter1/location/vieille-ville-7RjSzvD.webp","/assets/img/chapter1/location/crique-du-pendu-yDzsuFN.webp","/assets/img/chapter1/location/salle-des-murmures-YIqYi1M.webp","/assets/img/chapter1/riddle/bosquet-des-druides-test-05-18hVd1W.webp","/assets/img/chapter1/riddle/bosquet-des-druides-test-04-ITB6Mdu.webp","/assets/img/chapter1/riddle/bosquet-des-druides-test-03-qpYQLMy.webp","/assets/img/chapter1/riddle/bosquet-des-druides-test-02-p7LTdfS.webp","/assets/img/chapter1/riddle/bosquet-des-druides-test-01-TBrtfdJ.webp","/assets/img/chapter1/creature/gerome-le-pendu-1ts5dhz.png","/assets/img/chapter1/creature/nashore_book-MZU0TK6.png","/assets/img/chapter1/creature/nashore-ANnrMaJ.png","/assets/img/chapter1/creature/gerome-le-pendu_thumb-KACQzMb.png","/assets/img/chapter1/creature/nashore_thumb-EwgqOgq.png","/assets/img/chapter1/map/bois-du-pendu-d-OEly2.png","/assets/img/chapter1/map/plouc-eow4L-Z.png","/assets/img/chapter1/map/sables-chauds-9wd_Mvl.png","/assets/img/chapter1/map/donjon-de-lame_old-x3BxBLu.png","/assets/img/chapter1/map/royaume-de-l-ile-du-nord-e5SLqn0.png","/assets/img/chapter1/map/monts-terribles-m7fI4QQ.png","/assets/img/chapter1/map/port-saint-doux-v_slvFX.png","/assets/img/chapter1/map/donjon-de-lame-EnCNfAA.png","/assets/img/chapter1/npc/maire-de-port-saint-doux_alt-wCg3Jho.png","/assets/img/chapter1/npc/pecheur-du-quartier-des-ploucs_thumb-AOoQgFl.png","/assets/img/chapter1/npc/grand-pretre-de-port-saint-doux_thumb-jJB0QcI.png","/assets/img/chapter1/npc/myra-la-vieille-w0TyloD.png","/assets/img/chapter1/npc/bilo-le-passant-angry-gYmkZFT.png","/assets/img/chapter1/npc/roi-galdric_thumb-jsxE4Nk.png","/assets/img/chapter1/npc/theobald-le-gris-murmure_thumb-1k2el7L.png","/assets/img/chapter1/npc/farouk-le-nomade-J-dwCjq.png","/assets/img/chapter1/npc/jarrod-le-tavernier-angry-2ZhCPIh.png","/assets/img/chapter1/npc/tharol-le-silencieux-tqGTkiO.png","/assets/img/chapter1/npc/maire-de-port-saint-doux-FpB9UU5.png","/assets/img/chapter1/npc/prince-alaric_thumb-oPsaLTV.png","/assets/img/chapter1/npc/farouk-le-nomade_thumb-rPWFOF3.png","/assets/img/chapter1/npc/bilo-le-passant-Lkg0ajV.png","/assets/img/chapter1/npc/maire-de-port-saint-doux_thumb-HhiYpGA.png","/assets/img/chapter1/npc/roi-galdric-hZlzBxM.png","/assets/img/chapter1/npc/bilo-le-passant_thumb-qdgl40T.png","/assets/img/chapter1/npc/garde-du-quartier-des-chauves_thumb-AOfUH6h.png","/assets/img/chapter1/npc/servante-du-palais-zQuQOUL.png","/assets/img/chapter1/npc/sophie-la-marchande-bsSSQ1I.png","/assets/img/chapter1/npc/prince-alaric-8LOlk1s.png","/assets/img/chapter1/npc/robert-le-garde-CUbkSmN.png","/assets/img/chapter1/npc/bilo-le-passant_alt--Wt4Buj.png","/assets/img/chapter1/npc/jarrod-le-tavernier_thumb-jbsmFG4.png","/assets/img/chapter1/npc/theobald-le-gris-murmure-ed6rBur.png","/assets/img/chapter1/npc/grand-pretre-de-port-saint-doux-reE0pul.png","/assets/img/chapter1/npc/gart-le-forgeron-3nSIQXn.png","/assets/img/chapter1/npc/robert-le-garde-angry-4r9P0jM.png","/assets/img/chapter1/npc/prince-alaric_alt-IG-Zp3h.png","/assets/img/chapter1/npc/faux-djinn-lJHLHZE.png","/assets/img/chapter1/npc/wilbert-larcaniste-Y-Eeubm.png","/assets/img/chapter1/npc/gerard-le-pecheur_thumb-eZKOrWh.png","/assets/img/chapter1/npc/pecheur-du-quartier-des-ploucs_alt-yzpZMIK.png","/assets/img/chapter1/npc/myra-la-vieille_thumb-tlChxHM.png","/assets/img/chapter1/npc/sophie-la-marchande-angry-2GBeexe.png","/assets/img/chapter1/npc/faux-djinn_thumb-XbggepW.png","/assets/img/chapter1/npc/garde-du-palais_thumb-IFoqyGC.png","/assets/img/chapter1/npc/gart-le-forgeron_thumb-YSOWP_E.png","/assets/img/chapter1/npc/servante-du-palais_thumb-R2IdlhS.png","/assets/img/chapter1/npc/pecheur-du-quartier-des-ploucs-JYBQuFv.png","/assets/img/chapter1/npc/gerard-le-pecheur-uI7z3UY.png","/assets/img/chapter1/npc/garde-du-palais-SmetRnk.png","/assets/img/chapter1/npc/robert-le-garde_thumb-yyJTqnM.png","/assets/img/chapter1/npc/wilbert-larcaniste_thumb-oRm8pUd.png","/assets/img/chapter1/npc/garde-du-quartier-des-chauves-KsAURlN.png","/assets/img/chapter1/npc/jarrod-le-tavernier-8dN3znb.png","/assets/img/chapter1/npc/tharol-le-silencieux_thumb-rMtBpur.png","/assets/img/chapter1/npc/sophie-la-marchande_thumb-QfaMB0H.png","/assets/styles/layout/_index-4rNZYSK.css","/assets/styles/layout/form/_index-cvBv9ig.css","/assets/styles/layout/form/_group-7PhXRGn.css","/assets/styles/layout/form/_fieldset-HXgDX9n.css","/assets/styles/layout/character/levelup/_index-VLcZA_T.css","/assets/styles/layout/character/levelup/content/_index-6x4z3Tu.css","/assets/styles/layout/character/levelup/content/_spells-_dPaG7z.css","/assets/styles/layout/character/levelup/content/details/metrics/_index-CeZNmtV.css","/assets/styles/layout/character/levelup/content/details/metrics/_characteristics-kdjf8Wt.css","/assets/styles/layout/character/levelup/content/details/metrics/_attributes-DDdSRPT.css","/assets/styles/layout/character/levelup/content/details/_index-9nJAm4V.css","/assets/styles/layout/character/levelup/content/details/_description-kTswge1.css","/assets/styles/layout/character/levelup/content/details/_level-3mqmpW1.css","/assets/styles/layout/character/sheet/_index-XQJQEP_.css","/assets/styles/layout/character/sheet/content/_index-Ny-KdGF.css","/assets/styles/layout/character/sheet/content/_inventory-lAbOspe.css","/assets/styles/layout/character/sheet/content/_spells-dlxHAf0.css","/assets/styles/layout/character/sheet/content/_equipment-rkb4Hcp.css","/assets/styles/layout/character/sheet/content/details/metrics/_index-CeZNmtV.css","/assets/styles/layout/character/sheet/content/details/metrics/_characteristics--AD_3iW.css","/assets/styles/layout/character/sheet/content/details/metrics/_attributes-nGdk54S.css","/assets/styles/layout/character/sheet/content/details/_index-9nJAm4V.css","/assets/styles/layout/character/sheet/content/details/_description-WPPBUE2.css","/assets/styles/layout/character/sheet/content/details/_level--GGRmXe.css","/assets/styles/layout/character/sheet/content/_quests-i_ahq_E.css","/assets/styles/layout/character/sheet/_footer-8_vY_TM.css","/assets/styles/layout/character/sheet/_header--Grz5_k.css","/assets/styles/layout/_main-PQij6-8.css","/assets/styles/layout/map/_index-oD8ggiC.css","/assets/styles/layout/map/content/_index-Y1Eypo_.css","/assets/styles/layout/map/content/_walk-7PExzot.css","/assets/styles/layout/map/content/_location-OnrXi8K.css","/assets/styles/layout/map/content/_travel-pgjmCjF.css","/assets/styles/layout/map/content/_realm-1MUgbMq.css","/assets/styles/layout/map/_footer-1jwwR_I.css","/assets/styles/layout/map/_header-QeJMpYG.css","/assets/styles/layout/_grid-78pwuMx.css","/assets/styles/layout/screen/_index-gnexpqH.css","/assets/styles/layout/screen/footer/_index-znW1gRB.css","/assets/styles/layout/screen/footer/_actions-z6kNC85.css","/assets/styles/layout/screen/footer/_description-Ck3IW15.css","/assets/styles/layout/screen/footer/_replies-la9KHMT.css","/assets/styles/layout/screen/trade/_index-8lQGO9N.css","/assets/styles/layout/screen/trade/main/_index-uS-5c_Z.css","/assets/styles/layout/screen/trade/header/_index-Es0ctpN.css","/assets/styles/layout/screen/trade/header/_infos-5SEcL9R.css","/assets/styles/layout/screen/reload/_index-ZufLg2t.css","/assets/styles/layout/screen/reload/main/_index-0wSSJje.css","/assets/styles/layout/screen/cinematic/_index-6mUMamT.css","/assets/styles/layout/screen/cinematic/_footer-sVHjzzS.css","/assets/styles/layout/screen/cinematic/_section-VVhzS0c.css","/assets/styles/layout/screen/cinematic/_header-0wzwuBH.css","/assets/styles/layout/screen/main/_index-SV0hzzv.css","/assets/styles/layout/screen/repair/_index-17n9HDM.css","/assets/styles/layout/screen/repair/main/_index-g1F3CX6.css","/assets/styles/layout/screen/header/_index-C4y4xtM.css","/assets/styles/layout/screen/header/_title-7mbq3C_.css","/assets/styles/layout/screen/header/_infos-wZGjO2R.css","/assets/styles/layout/_section-yfVUUdW.css","/assets/styles/layout/_header-a9Sk9XU.css","/assets/styles/utils/_variables-rJ3zuTC.css","/assets/styles/utils/_animations-09LWoq5.css","/assets/styles/utils/_extends-abnkJAv.css","/assets/styles/utils/_mixins-SW6dTPn.css","/assets/styles/components/_gauge-Ywtjcxt.css","/assets/styles/components/form/_legend-ZheeMF-.css","/assets/styles/components/form/_label-6ZnfeNx.css","/assets/styles/components/form/_control-5DXloN-.css","/assets/styles/components/form/_file-gFDf2od.css","/assets/styles/components/form/_error-DvXmWNX.css","/assets/styles/components/form/_help-Vb44BlJ.css","/assets/styles/components/tooltip/_index-VlFZt8e.css","/assets/styles/components/tooltip/_book-PR-UCeA.css","/assets/styles/components/card/_index--vbQW8M.css","/assets/styles/components/card/_item-9yuOnb7.css","/assets/styles/components/card/_character-nJSxkBf.css","/assets/styles/components/card/_spell-xboYo95.css","/assets/styles/components/_popup-5KyGciu.css","/assets/styles/components/button/_cta-Z3z0RPX.css","/assets/styles/components/button/_index-WaNA0RN.css","/assets/styles/components/button/_outline-HPY2Dd-.css","/assets/styles/components/button/_back-XdLSuQ0.css","/assets/styles/components/_icon-fK1vWL9.css","/assets/styles/components/wallpaper/_index-ib3qYQ4.css","/assets/styles/components/wallpaper/_coverimg-MoneIXH.css","/assets/styles/components/wallpaper/_overlay-yX6FaFk.css","/assets/styles/components/_alert-OBCCzU_.css","/assets/styles/pages/character/_index-WCSrsg-.css","/assets/styles/pages/character/_levelup-RDg_SKw.css","/assets/styles/pages/character/_sheet-wIKqFIC.css","/assets/styles/pages/game/_index-sZDCno7.css","/assets/styles/pages/map/_index-PphW3IP.css","/assets/styles/pages/front-office/_index-YHpYm1K.css","/assets/styles/pages/front-office/form/_index-gaz66rp.css","/assets/styles/pages/front-office/form/_register-ulCHCZT.css","/assets/styles/pages/front-office/form/_login-DUnb5hd.css","/assets/styles/pages/front-office/form/_profile-CQM0ZcT.css","/assets/styles/pages/front-office/form/_character-cTz1J4O.css","/assets/styles/pages/front-office/character/_index-SzN8Wyh.css","/assets/styles/pages/front-office/character/_create-B2fjbgk.css","/assets/styles/pages/front-office/_home-vZvFU-q.css","/assets/styles/base/_typography-HbBbiXv.css","/assets/styles/base/_reset-Frl8_J3.css","/assets/styles/app-kA_ethY.css","/assets/icons/symfony-2x-uQcv.svg","/assets/controllers/alert_controller-a-SG1x4.js","/assets/controllers/autoscroll_controller-QxyJOn2.js","/assets/controllers/popup_controller-wAjE7zq.js","/assets/controllers/tooltip_controller-i55K3zX.js","/assets/controllers/csrf_protection_controller-DHNu0WH.js","/assets/app-iDQK6l-.js","/assets/vendor/@hotwired/stimulus/stimulus.index-S4zNcea.js","/assets/vendor/@hotwired/turbo/turbo.index-pT15T6h.js"].map(
    path =>
      cache_0_0.handleAll({
        event,
        request: new Request(path),
      })[1]
  );
  event.waitUntil(Promise.all(done));
});
const cache_2_0 = new workbox.strategies.CacheFirst({
  cacheName: 'fonts',plugins: [new workbox.cacheableResponse.CacheableResponsePlugin({"statuses":[0,200]}), new workbox.expiration.ExpirationPlugin({"maxEntries":60,"maxAgeSeconds":31536000})]
});
workbox.routing.registerRoute(({request}) => request.destination === 'font',cache_2_0,'GET');
const cache_3_0 = new workbox.strategies.StaleWhileRevalidate({
  cacheName: 'google-fonts-stylesheets',plugins: []
});
workbox.routing.registerRoute(({url}) => url.origin === 'https://fonts.googleapis.com',cache_3_0);
const cache_3_1 = new workbox.strategies.CacheFirst({
  cacheName: 'google-fonts-webfonts',plugins: [new workbox.cacheableResponse.CacheableResponsePlugin({"statuses":[0,200]}), new workbox.expiration.ExpirationPlugin({"maxEntries":30,"maxAgeSeconds":31536000})]
});
workbox.routing.registerRoute(({url}) => url.origin === 'https://fonts.gstatic.com',cache_3_1);
const cache_4_0 = new workbox.strategies.CacheFirst({
  cacheName: 'images',plugins: []
});
workbox.routing.registerRoute(({request, url}) => (request.destination === 'image' && !url.pathname.startsWith('/assets')),cache_4_0);
const cache_5_0 = new workbox.strategies.StaleWhileRevalidate({
  cacheName: 'manifest',plugins: []
});
workbox.routing.registerRoute(({url}) => '/site.webmanifest' === url.pathname,cache_5_0);self.addEventListener("install", function (event) {
    event.waitUntil(caches.keys().then(function (cacheNames) {
            return Promise.all(
                cacheNames.map(function (cacheName) {
                    return caches.delete(cacheName);
                })
            );
        })
    );
});

/**************************************************** WORKBOX IMPORT ****************************************************/
// The configuration is set to use Workbox
// The following code will import Workbox from CDN or public URL
// Import from public URL

importScripts('/workbox/workbox-sw.js');
workbox.setConfig({modulePathPrefix: '/workbox'});
/**************************************************** END WORKBOX IMPORT ****************************************************/






/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: CacheFirst
// Match: ({url}) => url.pathname.startsWith('/assets')
// Cache Name: assets
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_0_0 = new workbox.strategies.CacheFirst({
  cacheName: 'assets',plugins: [new workbox.expiration.ExpirationPlugin({
    "maxEntries": 968,
    "maxAgeSeconds": 31536000
})]
});
workbox.routing.registerRoute(({url}) => url.pathname.startsWith('/assets'),cache_0_0);
self.addEventListener('install', event => {
  const done = [
    "/assets/@spomky-labs/pwa-bundle/sync-broadcast_controller-2-cTsg3.js",
    "/assets/@spomky-labs/pwa-bundle/prefetch-on-demand_controller-e2Rt_GG.js",
    "/assets/@spomky-labs/pwa-bundle/backgroundsync-form_controller-ynS5Onz.js",
    "/assets/@spomky-labs/pwa-bundle/connection-status_controller-6uY2aFO.js",
    "/assets/@symfony/ux-live-component/live.min-ZJB0GOL.css",
    "/assets/@symfony/ux-live-component/live_controller-ZPUcqp6.js",
    "/assets/@symfony/ux-turbo/turbo_stream_controller-k6A1X0A.js",
    "/assets/@symfony/ux-turbo/turbo_controller-zl4y2v3.js",
    "/assets/@symfony/stimulus-bundle/controllers-rD6mdCN.js",
    "/assets/@symfony/stimulus-bundle/loader-kxG46ja.js",
    "/assets/bootstrap-lMx7M99.js",
    "/assets/img/core/cover-lzFe5t8.webp",
    "/assets/img/core/spell/shield-i8YJTqK.png",
    "/assets/img/core/spell/health-Tt5YR25.png",
    "/assets/img/core/spell/fire-tSLVFuk.png",
    "/assets/img/core/spell/illusion-tijsdZV.png",
    "/assets/img/core/spell/weapon-4bcnoXV.png",
    "/assets/img/core/spell/water-Y1bO1rs.png",
    "/assets/img/core/spell/nature-OxfSS06.png",
    "/assets/img/core/spell/mana-wpPxhbA.png",
    "/assets/img/core/spell/restoration-Bb8Z7hV.png",
    "/assets/img/core/spell/metamorphosis-BTxRWB4.png",
    "/assets/img/core/spell/storm-rQI3myS.png",
    "/assets/img/core/location/encounter-montagne-zojNMZY.webp",
    "/assets/img/core/location/arcanes_thumb-kz3cnfZ.webp",
    "/assets/img/core/location/encounter-foret-p9lAM_-.webp",
    "/assets/img/core/location/temple_thumb-92JCPBp.webp",
    "/assets/img/core/location/encounter-ville-Ir2AzPt.webp",
    "/assets/img/core/location/grotte_thumb-LoGed91.webp",
    "/assets/img/core/location/tunnel_thumb---haLy3.webp",
    "/assets/img/core/location/encounter-plaine-QImLcoa.webp",
    "/assets/img/core/location/maison_thumb-w34BrSP.webp",
    "/assets/img/core/location/encounter-plage-zLKWSxC.webp",
    "/assets/img/core/location/taverne_thumb-FogHQm8.webp",
    "/assets/img/core/location/encounter-desert-QLa1_FE.webp",
    "/assets/img/core/location/forge_thumb-vDisgf6.webp",
    "/assets/img/core/creature/fantome_thumb-h3x214Z.png",
    "/assets/img/core/creature/ours-cendre_thumb-rCWTNwj.png",
    "/assets/img/core/creature/gobelin-chef-QVnqLUl.png",
    "/assets/img/core/creature/gobelin-chef_book-0rF5tYr.png",
    "/assets/img/core/creature/harpie-des-cimes_book-WG-mn93.png",
    "/assets/img/core/creature/gobelin-chef_thumb-VlSOMJp.png",
    "/assets/img/core/creature/fantome_book-2YKh9tR.png",
    "/assets/img/core/creature/sanglier-noir_thumb-cYZoEqg.png",
    "/assets/img/core/creature/bouquetin-feroce_book-tLdAepY.png",
    "/assets/img/core/creature/squelette-de-marin_thumb-jTCo6oI.png",
    "/assets/img/core/creature/ours-cendre_book-FDUEOpG.png",
    "/assets/img/core/creature/harpie-des-cimes_thumb-V9_TgqL.png",
    "/assets/img/core/creature/ame-en-peine_thumb-MfzggCi.png",
    "/assets/img/core/creature/loup_thumb-i2q1awl.png",
    "/assets/img/core/creature/gobelin-chef_alt-s-jJ7Yb.png",
    "/assets/img/core/creature/gobelin-guerrier_book-OW_kUx7.png",
    "/assets/img/core/creature/corbeau-des-brumes_book-za1bRIz.png",
    "/assets/img/core/creature/gros-rat_book-4KuRt1X.png",
    "/assets/img/core/creature/sirene-melancolique_thumb-fehotNV.png",
    "/assets/img/core/creature/ame-en-peine_book--NEHBfG.png",
    "/assets/img/core/creature/squelette-guerrier_book-Dv0EMEv.png",
    "/assets/img/core/creature/squelette-de-marin_book-945cew0.png",
    "/assets/img/core/creature/rat-geant_book-Y5bIOom.png",
    "/assets/img/core/creature/dragon-de-pierre-fqJL4vK.png",
    "/assets/img/core/creature/rat-geant_thumb-2n_nlM_.png",
    "/assets/img/core/creature/sirene-melancolique-QRwZSLZ.png",
    "/assets/img/core/creature/gobelin-guerrier_thumb-SO6ajWV.png",
    "/assets/img/core/creature/squelette-deryl_thumb-j9mtZwI.png",
    "/assets/img/core/creature/dragon-de-pierre_book-uEnBPdT.png",
    "/assets/img/core/creature/bouquetin-feroce_thumb-KJgA6p6.png",
    "/assets/img/core/creature/sirene-melancolique-angry-BYxEM27.png",
    "/assets/img/core/creature/gobelin-eclaireur_thumb-jN_6lD9.png",
    "/assets/img/core/creature/dragon-de-pierre_thumb-m0Sh0nM.png",
    "/assets/img/core/creature/squelette-deryl-NIxXd_-.png",
    "/assets/img/core/creature/sanglier-noir_book-L4biEjV.png",
    "/assets/img/core/creature/sirene_book-cX1g0KH.png",
    "/assets/img/core/creature/gros-rat_thumb-_1-2jf-.png",
    "/assets/img/core/creature/gobelin-eclaireur_book-srIZtU0.png",
    "/assets/img/core/creature/loup_book-_Rhi-K-.png",
    "/assets/img/core/action/rumor-akx3v9z.png",
    "/assets/img/core/action/sing-4lvvDob.png",
    "/assets/img/core/action/cast-4uN1hi3.png",
    "/assets/img/core/action/decline-CN5g6bK.png",
    "/assets/img/core/action/fist-E5BXUy-.png",
    "/assets/img/core/action/talk-vYPM1M5.png",
    "/assets/img/core/action/spell-wpPxhbA.png",
    "/assets/img/core/action/sleep-62Egdwp.png",
    "/assets/img/core/action/steal-XAENOYV.png",
    "/assets/img/core/action/search-KBBFYMw.png",
    "/assets/img/core/action/pray-JJHV88C.png",
    "/assets/img/core/action/angry-ff14453.png",
    "/assets/img/core/action/test-3yiVzWE.png",
    "/assets/img/core/action/flee-Ync3Zi5.png",
    "/assets/img/core/action/walk-FcscdKC.png",
    "/assets/img/core/action/attack-euH26-x.png",
    "/assets/img/core/action/exit-B82j_hX.png",
    "/assets/img/core/action/accept-CrWniUr.png",
    "/assets/img/core/action/trade-yfAoKya.png",
    "/assets/img/core/action/leave-1sobBHn.png",
    "/assets/img/core/action/reload-6Cu9FAq.png",
    "/assets/img/core/action/repair-43y-6Oa.png",
    "/assets/img/core/logo-tYcpRbY.png",
    "/assets/img/core/item/shield/shield_iron-_pT2TfG.png",
    "/assets/img/core/item/shield/shield_steel_enchanted-cYqBbKb.png",
    "/assets/img/core/item/shield/shield_steel-4cgzDgT.png",
    "/assets/img/core/item/shield/shield_wood-ajaAQ6W.png",
    "/assets/img/core/item/shield/shield_iron_enchanted-JfnxFG9.png",
    "/assets/img/core/item/shield/shield_wood_enchanted-A-xifO2.png",
    "/assets/img/core/item/weapon/croc-daskalor-YJRO4Th.png",
    "/assets/img/core/item/weapon/ax_war_enchanted-egNRihm.png",
    "/assets/img/core/item/weapon/bow_short-iTCThrz.png",
    "/assets/img/core/item/weapon/bow_long-UFrUipB.png",
    "/assets/img/core/item/weapon/dagger-vvCFuos.png",
    "/assets/img/core/item/weapon/sword_long-jp7e9xR.png",
    "/assets/img/core/item/weapon/sword_short-BwwhlUJ.png",
    "/assets/img/core/item/weapon/hammer_war_enchanted-MemaRgH.png",
    "/assets/img/core/item/weapon/ax_war-PbTfRGg.png",
    "/assets/img/core/item/weapon/gun-D3xpkUI.png",
    "/assets/img/core/item/weapon/hammer_war-MyHUiau.png",
    "/assets/img/core/item/weapon/magical_wand-1OqVFvU.png",
    "/assets/img/core/item/weapon/sword_long_enchanted-Nw70I1S.png",
    "/assets/img/core/item/weapon/magical_stick-BdE1j0R.png",
    "/assets/img/core/item/weapon/dagger_enchanted-eWikZmO.png",
    "/assets/img/core/item/weapon/fight-stick-Ep1ZTF6.png",
    "/assets/img/core/item/weapon/sword_short_enchanted-JKGRJhY.png",
    "/assets/img/core/item/weapon/bow_short_enchanted-afygIfm.png",
    "/assets/img/core/item/weapon/pickaxe-7iu3h35.png",
    "/assets/img/core/item/weapon/bow_long_enchanted-nqgNY4c.png",
    "/assets/img/core/item/scroll/scroll-8u0DLwK.png",
    "/assets/img/core/item/gift/flowers-n4J-OKh.png",
    "/assets/img/core/item/gift/ring_gold-itEEBGa.png",
    "/assets/img/core/item/gift/ring_silver-39xAuHT.png",
    "/assets/img/core/item/gift/ring_copper-WlIGuA9.png",
    "/assets/img/core/item/amulet/amulette-du-cercle-anVAx--.png",
    "/assets/img/core/item/amulet/coeur-decume-wMzAx2l.png",
    "/assets/img/core/item/amulet/medaillon-des-vents-a2Kdx-_.png",
    "/assets/img/core/item/amulet/amulet-fi7Lhha.png",
    "/assets/img/core/item/map/desert-nWNyyzj.png",
    "/assets/img/core/item/map/city-yv3LUUE.png",
    "/assets/img/core/item/map/forest-0EXaTeZ.png",
    "/assets/img/core/item/map/realm-tuz5Kmb.png",
    "/assets/img/core/item/map/mountain-DBuhWgT.png",
    "/assets/img/core/item/map/village-xBtBOQV.png",
    "/assets/img/core/item/map/dungeon-T5ZJznk.png",
    "/assets/img/core/item/armor/armor_iron-T4X82Rj.png",
    "/assets/img/core/item/armor/armor_robe_druid-TqgFK2R.png",
    "/assets/img/core/item/armor/armor_robe_mage-y-6iXaH.png",
    "/assets/img/core/item/armor/armor_robe_druid_enchanted-aaYko2H.png",
    "/assets/img/core/item/armor/armor_robe_mage_enchanted--3THUze.png",
    "/assets/img/core/item/armor/armor_steel_enchanted-jfv5bhN.png",
    "/assets/img/core/item/armor/armor_iron_enchanted-4pdbdfr.png",
    "/assets/img/core/item/armor/armor_plates_enchanted-AEgluv9.png",
    "/assets/img/core/item/armor/armor_steel-Z5JFNmI.png",
    "/assets/img/core/item/armor/armor_leather_enchanted-SgJygQ5.png",
    "/assets/img/core/item/armor/armor_leather-oZcA4aZ.png",
    "/assets/img/core/item/armor/armor_plates-q80AQpS.png",
    "/assets/img/core/item/food/food_bread-C4Xa5Ie.png",
    "/assets/img/core/item/food/food_chicken-O7qjSEt.png",
    "/assets/img/core/item/food/food_wine-ej9OrYw.png",
    "/assets/img/core/item/food/food_meat-7iTtK7K.png",
    "/assets/img/core/item/food/food_beer-kyZpVPm.png",
    "/assets/img/core/item/food/food_cheese-d9YmXdJ.png",
    "/assets/img/core/item/food/food_fish-nggB_-G.png",
    "/assets/img/core/item/book/book_author-ykNdOQI.png",
    "/assets/img/core/item/book/book_diary-woSFfv2.png",
    "/assets/img/core/item/book/book_letter-tl_LwAY.png",
    "/assets/img/core/item/ring/ring-Ix40V6l.png",
    "/assets/img/core/item/potion/potion_health-FpdTRH7.png",
    "/assets/img/core/item/potion/potion_util-bnGZWFx.png",
    "/assets/img/core/item/potion/potion_mana-B6J-4SA.png",
    "/assets/img/core/item/potion/potion_broken-zVOJKHJ.png",
    "/assets/img/core/screen/jail-rlerGyx.webp",
    "/assets/img/core/reward/chest-z-3RKA-.png",
    "/assets/img/core/reward/royal_box-oOichFD.png",
    "/assets/img/core/reward/gift-TCqEIWq.png",
    "/assets/img/core/pregenerated/lyra-lagile-wSH-QrF.png",
    "/assets/img/core/pregenerated/eryndor-le-vigilant-doQX_4t.png",
    "/assets/img/core/pregenerated/tharasha-la-sauvage_thumb-mO-gotU.png",
    "/assets/img/core/pregenerated/isilea-la-gardienne-to4dcU1.png",
    "/assets/img/core/pregenerated/lyra-lagile_thumb-HzISITf.png",
    "/assets/img/core/pregenerated/elandra-la-sage_thumb-Z-CsiP1.png",
    "/assets/img/core/pregenerated/tharasha-la-sauvage-LcveKLq.png",
    "/assets/img/core/pregenerated/grymm-le-bricoleur_thumb-kgd_2Zt.png",
    "/assets/img/core/pregenerated/thorin-le-feroce-L5LeoOv.png",
    "/assets/img/core/pregenerated/isilea-la-gardienne_thumb-kc8mmbN.png",
    "/assets/img/core/pregenerated/eryndor-le-vigilant_thumb-CvfyLIE.png",
    "/assets/img/core/pregenerated/grymm-le-bricoleur-yLYS7zV.png",
    "/assets/img/core/pregenerated/aldrin-le-brave-efCOpzD.png",
    "/assets/img/core/pregenerated/thorin-le-feroce_thumb-gHTNZXG.png",
    "/assets/img/core/pregenerated/elandra-la-sage-hXFtl3e.png",
    "/assets/img/core/pregenerated/aldrin-le-brave_thumb-27ctfbO.png",
    "/assets/img/core/cover_documentation-FyZ1KQK.png",
    "/assets/img/core/equipment/bow-39XEcaM.png",
    "/assets/img/core/equipment/anneau-es2ySqN.png",
    "/assets/img/core/equipment/nourriture-1N8Q_kU.png",
    "/assets/img/core/equipment/bouclier-nqN-mm-.png",
    "/assets/img/core/equipment/shield-nqN-mm-.png",
    "/assets/img/core/equipment/carte-LTnTkzv.png",
    "/assets/img/core/equipment/potion-4vXtQlD.png",
    "/assets/img/core/equipment/inventory-2RsMM5s.png",
    "/assets/img/core/equipment/divers-nZKYRSA.png",
    "/assets/img/core/equipment/armure-0A4uWS6.png",
    "/assets/img/core/equipment/cadeau-a1AcvQq.png",
    "/assets/img/core/equipment/armor-0A4uWS6.png",
    "/assets/img/core/equipment/parchemin-AG898Ol.png",
    "/assets/img/core/equipment/equipment-z0RkGvG.png",
    "/assets/img/core/equipment/ring-es2ySqN.png",
    "/assets/img/core/equipment/livre-JHvRV9_.png",
    "/assets/img/core/equipment/sword-f9ACnDX.png",
    "/assets/img/core/equipment/arme-magique-lqs1jVV.png",
    "/assets/img/core/equipment/arme-f9ACnDX.png",
    "/assets/img/core/equipment/amulette-Qdm4dWB.png",
    "/assets/img/core/equipment/arc-39XEcaM.png",
    "/assets/img/core/equipment/scroll-AG898Ol.png",
    "/assets/img/core/equipment/amulet-Qdm4dWB.png",
    "/assets/img/core/npc/druide-NPaZTKp.png",
    "/assets/img/core/npc/sbire-9gZBr-i.png",
    "/assets/img/core/npc/chef-malfrat-Ad1mVMs.png",
    "/assets/img/core/npc/nain-mineur-IJwxzHN.png",
    "/assets/img/core/npc/nain-mineur_thumb-E51_jMO.png",
    "/assets/img/core/npc/grand-druide-eEmCTSj.png",
    "/assets/img/core/npc/chef-malfrat_thumb-gLlZvi8.png",
    "/assets/img/core/npc/grand-druide_thumb-a4mkm_E.png",
    "/assets/img/core/npc/sbire_thumb-gomh5c8.png",
    "/assets/img/core/npc/druide_thumb-dp9xxtW.png",
    "/assets/img/chapter1/combat/port-saint-doux-une-bande-de-rats-sur-les-docks-5iu_UA7.webp",
    "/assets/img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge-Z0W4OI-.png",
    "/assets/img/chapter1/combat/bois-du-pendu-druides-de-la-clairiere_thumb-dp9xxtW.png",
    "/assets/img/chapter1/combat/bois-du-pendu-gerome-Cp_yCHk.webp",
    "/assets/img/chapter1/combat/port-saint-doux-une-bande-de-rats-sur-les-docks_thumb-_1-2jf-.png",
    "/assets/img/chapter1/combat/plage-de-la-sirene-squelettes-marins_thumb-j9mtZwI.png",
    "/assets/img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge_thumb-2n9EnOS.png",
    "/assets/img/chapter1/combat/plage-de-la-sirene-squelettes-marins-cOHHWpx.png",
    "/assets/img/chapter1/combat/bois-du-pendu-druides-de-la-clairiere-wfBEDYr.webp",
    "/assets/img/chapter1/combat/plouc-eclaireurs-gobelins-48kZiJG.webp",
    "/assets/img/chapter1/combat/bois-du-pendu-druides-du-bosquet_thumb-3gjmBtt.png",
    "/assets/img/chapter1/combat/bois-du-pendu-druides-du-bosquet-yPy8qjU.webp",
    "/assets/img/chapter1/combat/plouc-eclaireurs-gobelins_thumb-GHo__eZ.png",
    "/assets/img/chapter1/combat/plouc-campement-gobelin--ZL48qr.webp",
    "/assets/img/chapter1/combat/bois-du-pendu-gerome_thumb-WKSzob1.png",
    "/assets/img/chapter1/combat/plouc-campement-gobelin_thumb-GtBgzs9.png",
    "/assets/img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks-9Nl3lYN.webp",
    "/assets/img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks_thumb-2n_nlM_.png",
    "/assets/img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge-ognqCfU.webp",
    "/assets/img/chapter1/location/maison-de-gerard-le-pecheur-vZqo__S.webp",
    "/assets/img/chapter1/location/le-tunnel-de-bardin-zsLhpVq.webp",
    "/assets/img/chapter1/location/rocher-du-dragon-ZfuNmxH.webp",
    "/assets/img/chapter1/location/jardins-de-la-mairie-9DjiA9V.webp",
    "/assets/img/chapter1/location/salle-du-miroir-CnbGXDA.webp",
    "/assets/img/chapter1/location/nuit_docks-de-louest-B4Kct_L.webp",
    "/assets/img/chapter1/location/palais-royal-kl6q0z7.webp",
    "/assets/img/chapter1/location/sables-chauds-kS8yY4V.webp",
    "/assets/img/chapter1/location/refuge-du-bouc-boiteux-BMJ9mlC.webp",
    "/assets/img/chapter1/location/crypte-inversee-QWPAOC-.webp",
    "/assets/img/chapter1/location/la-grotte-OuBAZ3p.webp",
    "/assets/img/chapter1/location/camp-abandonne-sd3-M93.webp",
    "/assets/img/chapter1/location/tombeau-de-galdric-premier-iL3-JKA.webp",
    "/assets/img/chapter1/location/bois-des-relents-cqC4h6r.webp",
    "/assets/img/chapter1/location/nouvelle-ville-6elzf1X.webp",
    "/assets/img/chapter1/location/antichambre-du-roi-by_Dl_g.webp",
    "/assets/img/chapter1/location/bois-du-pendu-NQgE-Fi.webp",
    "/assets/img/chapter1/location/bosquet-des-druides-KSZ8jtx.webp",
    "/assets/img/chapter1/location/grotte-des-echos-wKNqtp4.webp",
    "/assets/img/chapter1/location/palais-royal_thumb-Vp838m3.webp",
    "/assets/img/chapter1/location/quartier-des-chauves-bhqRoaC.webp",
    "/assets/img/chapter1/location/forge-de-port-saint-doux-rZ7yP40.webp",
    "/assets/img/chapter1/location/hotel-de-ville_thumb-41TRWJb.webp",
    "/assets/img/chapter1/location/le-refuge_alt-B4uy_KV.webp",
    "/assets/img/chapter1/location/donjon-de-l-ame_thumb-IeSrPhB.webp",
    "/assets/img/chapter1/location/quartier-du-marche-XWiCGD2.webp",
    "/assets/img/chapter1/location/temple-de-port-saint-doux-tdQITMH.webp",
    "/assets/img/chapter1/location/quartier-des-ploucs-2658hJR.webp",
    "/assets/img/chapter1/location/hall-dentree-Ep4WQNO.webp",
    "/assets/img/chapter1/location/le-refuge-e2CpWZJ.webp",
    "/assets/img/chapter1/location/monts-terribles-CipvVK3.webp",
    "/assets/img/chapter1/location/campement-gobelin_thumb-pAWmTBN.webp",
    "/assets/img/chapter1/location/entree-du-donjon-VAZ-UMe.webp",
    "/assets/img/chapter1/location/salle-des-chaines-avNDmG9.webp",
    "/assets/img/chapter1/location/jardins-de-la-mairie_thumb-b9ElRiY.webp",
    "/assets/img/chapter1/location/gouffre-daskalor-9XSQPy1.webp",
    "/assets/img/chapter1/location/taverne-de-la-flute-moisie-6ViPk98.webp",
    "/assets/img/chapter1/location/maison-de-gerard-le-pecheur_alt-1EayrxT.webp",
    "/assets/img/chapter1/location/entree-du-donjon_alt-mHXLHyL.webp",
    "/assets/img/chapter1/location/port-saint-doux-E_HUf5A.webp",
    "/assets/img/chapter1/location/royaume-de-lile-du-nord-B9FJXJA.webp",
    "/assets/img/chapter1/location/col-du-vent-noir-GKGSD11.webp",
    "/assets/img/chapter1/location/campement-gobelin_alt-iBBTmRp.webp",
    "/assets/img/chapter1/location/hotel-de-ville_alt-05RQkec.webp",
    "/assets/img/chapter1/location/oasis-sans-nom-GFBo9go.webp",
    "/assets/img/chapter1/location/docks-de-louest-i_uOuPi.webp",
    "/assets/img/chapter1/location/arcanes-de-port-saint-doux-bQJQc2t.webp",
    "/assets/img/chapter1/location/plouc-t1fVONa.webp",
    "/assets/img/chapter1/location/quartier-des-ploucs_alt-5oQ0Cpe.webp",
    "/assets/img/chapter1/location/anciens-docks-AVaHd-z.webp",
    "/assets/img/chapter1/location/la-chambre-du-rituel-CIYp4z3.webp",
    "/assets/img/chapter1/location/appartements-royaux-6fqxAiG.webp",
    "/assets/img/chapter1/location/oree-du-bois-3hVGQG-.webp",
    "/assets/img/chapter1/location/campement-gobelin-UzFMf7C.webp",
    "/assets/img/chapter1/location/plage-de-la-sirene-uN6tE9-.webp",
    "/assets/img/chapter1/location/plouc_alt-t1fVONa.webp",
    "/assets/img/chapter1/location/quartier-du-marche_alt-RoEaK8N.webp",
    "/assets/img/chapter1/location/le-gouffre-xW42tJk.webp",
    "/assets/img/chapter1/location/clairiere-de-loublie-Y8E9HI2.webp",
    "/assets/img/chapter1/location/appartements-royaux_thumb-UiGqdnM.webp",
    "/assets/img/chapter1/location/donjon-de-l-ame-u6ALy5T.webp",
    "/assets/img/chapter1/location/hotel-de-ville-mQhIv7w.webp",
    "/assets/img/chapter1/location/vieille-ville-7RjSzvD.webp",
    "/assets/img/chapter1/location/crique-du-pendu-yDzsuFN.webp",
    "/assets/img/chapter1/location/salle-des-murmures-YIqYi1M.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-05-18hVd1W.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-04-ITB6Mdu.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-03-qpYQLMy.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-02-p7LTdfS.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-01-TBrtfdJ.webp",
    "/assets/img/chapter1/creature/gerome-le-pendu-1ts5dhz.png",
    "/assets/img/chapter1/creature/nashore_book-MZU0TK6.png",
    "/assets/img/chapter1/creature/nashore-ANnrMaJ.png",
    "/assets/img/chapter1/creature/gerome-le-pendu_thumb-KACQzMb.png",
    "/assets/img/chapter1/creature/nashore_thumb-EwgqOgq.png",
    "/assets/img/chapter1/map/bois-du-pendu-d-OEly2.png",
    "/assets/img/chapter1/map/plouc-eow4L-Z.png",
    "/assets/img/chapter1/map/sables-chauds-9wd_Mvl.png",
    "/assets/img/chapter1/map/donjon-de-lame_old-x3BxBLu.png",
    "/assets/img/chapter1/map/royaume-de-l-ile-du-nord-e5SLqn0.png",
    "/assets/img/chapter1/map/monts-terribles-m7fI4QQ.png",
    "/assets/img/chapter1/map/port-saint-doux-v_slvFX.png",
    "/assets/img/chapter1/map/donjon-de-lame-EnCNfAA.png",
    "/assets/img/chapter1/npc/maire-de-port-saint-doux_alt-wCg3Jho.png",
    "/assets/img/chapter1/npc/pecheur-du-quartier-des-ploucs_thumb-AOoQgFl.png",
    "/assets/img/chapter1/npc/grand-pretre-de-port-saint-doux_thumb-jJB0QcI.png",
    "/assets/img/chapter1/npc/myra-la-vieille-w0TyloD.png",
    "/assets/img/chapter1/npc/bilo-le-passant-angry-gYmkZFT.png",
    "/assets/img/chapter1/npc/roi-galdric_thumb-jsxE4Nk.png",
    "/assets/img/chapter1/npc/theobald-le-gris-murmure_thumb-1k2el7L.png",
    "/assets/img/chapter1/npc/farouk-le-nomade-J-dwCjq.png",
    "/assets/img/chapter1/npc/jarrod-le-tavernier-angry-2ZhCPIh.png",
    "/assets/img/chapter1/npc/tharol-le-silencieux-tqGTkiO.png",
    "/assets/img/chapter1/npc/maire-de-port-saint-doux-FpB9UU5.png",
    "/assets/img/chapter1/npc/prince-alaric_thumb-oPsaLTV.png",
    "/assets/img/chapter1/npc/farouk-le-nomade_thumb-rPWFOF3.png",
    "/assets/img/chapter1/npc/bilo-le-passant-Lkg0ajV.png",
    "/assets/img/chapter1/npc/maire-de-port-saint-doux_thumb-HhiYpGA.png",
    "/assets/img/chapter1/npc/roi-galdric-hZlzBxM.png",
    "/assets/img/chapter1/npc/bilo-le-passant_thumb-qdgl40T.png",
    "/assets/img/chapter1/npc/garde-du-quartier-des-chauves_thumb-AOfUH6h.png",
    "/assets/img/chapter1/npc/servante-du-palais-zQuQOUL.png",
    "/assets/img/chapter1/npc/sophie-la-marchande-bsSSQ1I.png",
    "/assets/img/chapter1/npc/prince-alaric-8LOlk1s.png",
    "/assets/img/chapter1/npc/robert-le-garde-CUbkSmN.png",
    "/assets/img/chapter1/npc/bilo-le-passant_alt--Wt4Buj.png",
    "/assets/img/chapter1/npc/jarrod-le-tavernier_thumb-jbsmFG4.png",
    "/assets/img/chapter1/npc/theobald-le-gris-murmure-ed6rBur.png",
    "/assets/img/chapter1/npc/grand-pretre-de-port-saint-doux-reE0pul.png",
    "/assets/img/chapter1/npc/gart-le-forgeron-3nSIQXn.png",
    "/assets/img/chapter1/npc/robert-le-garde-angry-4r9P0jM.png",
    "/assets/img/chapter1/npc/prince-alaric_alt-IG-Zp3h.png",
    "/assets/img/chapter1/npc/faux-djinn-lJHLHZE.png",
    "/assets/img/chapter1/npc/wilbert-larcaniste-Y-Eeubm.png",
    "/assets/img/chapter1/npc/gerard-le-pecheur_thumb-eZKOrWh.png",
    "/assets/img/chapter1/npc/pecheur-du-quartier-des-ploucs_alt-yzpZMIK.png",
    "/assets/img/chapter1/npc/myra-la-vieille_thumb-tlChxHM.png",
    "/assets/img/chapter1/npc/sophie-la-marchande-angry-2GBeexe.png",
    "/assets/img/chapter1/npc/faux-djinn_thumb-XbggepW.png",
    "/assets/img/chapter1/npc/garde-du-palais_thumb-IFoqyGC.png",
    "/assets/img/chapter1/npc/gart-le-forgeron_thumb-YSOWP_E.png",
    "/assets/img/chapter1/npc/servante-du-palais_thumb-R2IdlhS.png",
    "/assets/img/chapter1/npc/pecheur-du-quartier-des-ploucs-JYBQuFv.png",
    "/assets/img/chapter1/npc/gerard-le-pecheur-uI7z3UY.png",
    "/assets/img/chapter1/npc/garde-du-palais-SmetRnk.png",
    "/assets/img/chapter1/npc/robert-le-garde_thumb-yyJTqnM.png",
    "/assets/img/chapter1/npc/wilbert-larcaniste_thumb-oRm8pUd.png",
    "/assets/img/chapter1/npc/garde-du-quartier-des-chauves-KsAURlN.png",
    "/assets/img/chapter1/npc/jarrod-le-tavernier-8dN3znb.png",
    "/assets/img/chapter1/npc/tharol-le-silencieux_thumb-rMtBpur.png",
    "/assets/img/chapter1/npc/sophie-la-marchande_thumb-QfaMB0H.png",
    "/assets/styles/layout/_index-4rNZYSK.css",
    "/assets/styles/layout/form/_index-cvBv9ig.css",
    "/assets/styles/layout/form/_group-7PhXRGn.css",
    "/assets/styles/layout/form/_fieldset-HXgDX9n.css",
    "/assets/styles/layout/character/levelup/_index-VLcZA_T.css",
    "/assets/styles/layout/character/levelup/content/_index-6x4z3Tu.css",
    "/assets/styles/layout/character/levelup/content/_spells-_dPaG7z.css",
    "/assets/styles/layout/character/levelup/content/details/metrics/_index-CeZNmtV.css",
    "/assets/styles/layout/character/levelup/content/details/metrics/_characteristics-kdjf8Wt.css",
    "/assets/styles/layout/character/levelup/content/details/metrics/_attributes-DDdSRPT.css",
    "/assets/styles/layout/character/levelup/content/details/_index-9nJAm4V.css",
    "/assets/styles/layout/character/levelup/content/details/_description-kTswge1.css",
    "/assets/styles/layout/character/levelup/content/details/_level-3mqmpW1.css",
    "/assets/styles/layout/character/sheet/_index-XQJQEP_.css",
    "/assets/styles/layout/character/sheet/content/_index-Ny-KdGF.css",
    "/assets/styles/layout/character/sheet/content/_inventory-lAbOspe.css",
    "/assets/styles/layout/character/sheet/content/_spells-dlxHAf0.css",
    "/assets/styles/layout/character/sheet/content/_equipment-rkb4Hcp.css",
    "/assets/styles/layout/character/sheet/content/details/metrics/_index-CeZNmtV.css",
    "/assets/styles/layout/character/sheet/content/details/metrics/_characteristics--AD_3iW.css",
    "/assets/styles/layout/character/sheet/content/details/metrics/_attributes-nGdk54S.css",
    "/assets/styles/layout/character/sheet/content/details/_index-9nJAm4V.css",
    "/assets/styles/layout/character/sheet/content/details/_description-WPPBUE2.css",
    "/assets/styles/layout/character/sheet/content/details/_level--GGRmXe.css",
    "/assets/styles/layout/character/sheet/content/_quests-i_ahq_E.css",
    "/assets/styles/layout/character/sheet/_footer-8_vY_TM.css",
    "/assets/styles/layout/character/sheet/_header--Grz5_k.css",
    "/assets/styles/layout/_main-PQij6-8.css",
    "/assets/styles/layout/map/_index-oD8ggiC.css",
    "/assets/styles/layout/map/content/_index-Y1Eypo_.css",
    "/assets/styles/layout/map/content/_walk-7PExzot.css",
    "/assets/styles/layout/map/content/_location-OnrXi8K.css",
    "/assets/styles/layout/map/content/_travel-pgjmCjF.css",
    "/assets/styles/layout/map/content/_realm-1MUgbMq.css",
    "/assets/styles/layout/map/_footer-1jwwR_I.css",
    "/assets/styles/layout/map/_header-QeJMpYG.css",
    "/assets/styles/layout/_grid-78pwuMx.css",
    "/assets/styles/layout/screen/_index-gnexpqH.css",
    "/assets/styles/layout/screen/footer/_index-znW1gRB.css",
    "/assets/styles/layout/screen/footer/_actions-z6kNC85.css",
    "/assets/styles/layout/screen/footer/_description-Ck3IW15.css",
    "/assets/styles/layout/screen/footer/_replies-la9KHMT.css",
    "/assets/styles/layout/screen/trade/_index-8lQGO9N.css",
    "/assets/styles/layout/screen/trade/main/_index-uS-5c_Z.css",
    "/assets/styles/layout/screen/trade/header/_index-Es0ctpN.css",
    "/assets/styles/layout/screen/trade/header/_infos-5SEcL9R.css",
    "/assets/styles/layout/screen/reload/_index-ZufLg2t.css",
    "/assets/styles/layout/screen/reload/main/_index-0wSSJje.css",
    "/assets/styles/layout/screen/cinematic/_index-6mUMamT.css",
    "/assets/styles/layout/screen/cinematic/_footer-sVHjzzS.css",
    "/assets/styles/layout/screen/cinematic/_section-VVhzS0c.css",
    "/assets/styles/layout/screen/cinematic/_header-0wzwuBH.css",
    "/assets/styles/layout/screen/main/_index-SV0hzzv.css",
    "/assets/styles/layout/screen/repair/_index-17n9HDM.css",
    "/assets/styles/layout/screen/repair/main/_index-g1F3CX6.css",
    "/assets/styles/layout/screen/header/_index-C4y4xtM.css",
    "/assets/styles/layout/screen/header/_title-7mbq3C_.css",
    "/assets/styles/layout/screen/header/_infos-wZGjO2R.css",
    "/assets/styles/layout/_section-yfVUUdW.css",
    "/assets/styles/layout/_header-a9Sk9XU.css",
    "/assets/styles/utils/_variables-rJ3zuTC.css",
    "/assets/styles/utils/_animations-09LWoq5.css",
    "/assets/styles/utils/_extends-abnkJAv.css",
    "/assets/styles/utils/_mixins-SW6dTPn.css",
    "/assets/styles/components/_gauge-Ywtjcxt.css",
    "/assets/styles/components/form/_legend-ZheeMF-.css",
    "/assets/styles/components/form/_label-6ZnfeNx.css",
    "/assets/styles/components/form/_control-5DXloN-.css",
    "/assets/styles/components/form/_file-gFDf2od.css",
    "/assets/styles/components/form/_error-DvXmWNX.css",
    "/assets/styles/components/form/_help-Vb44BlJ.css",
    "/assets/styles/components/tooltip/_index-VlFZt8e.css",
    "/assets/styles/components/tooltip/_book-PR-UCeA.css",
    "/assets/styles/components/card/_index--vbQW8M.css",
    "/assets/styles/components/card/_item-9yuOnb7.css",
    "/assets/styles/components/card/_character-nJSxkBf.css",
    "/assets/styles/components/card/_spell-xboYo95.css",
    "/assets/styles/components/_popup-5KyGciu.css",
    "/assets/styles/components/button/_cta-Z3z0RPX.css",
    "/assets/styles/components/button/_index-WaNA0RN.css",
    "/assets/styles/components/button/_outline-HPY2Dd-.css",
    "/assets/styles/components/button/_back-XdLSuQ0.css",
    "/assets/styles/components/_icon-fK1vWL9.css",
    "/assets/styles/components/wallpaper/_index-ib3qYQ4.css",
    "/assets/styles/components/wallpaper/_coverimg-MoneIXH.css",
    "/assets/styles/components/wallpaper/_overlay-yX6FaFk.css",
    "/assets/styles/components/_alert-OBCCzU_.css",
    "/assets/styles/pages/character/_index-WCSrsg-.css",
    "/assets/styles/pages/character/_levelup-RDg_SKw.css",
    "/assets/styles/pages/character/_sheet-wIKqFIC.css",
    "/assets/styles/pages/game/_index-sZDCno7.css",
    "/assets/styles/pages/map/_index-PphW3IP.css",
    "/assets/styles/pages/front-office/_index-YHpYm1K.css",
    "/assets/styles/pages/front-office/form/_index-gaz66rp.css",
    "/assets/styles/pages/front-office/form/_register-ulCHCZT.css",
    "/assets/styles/pages/front-office/form/_login-DUnb5hd.css",
    "/assets/styles/pages/front-office/form/_profile-CQM0ZcT.css",
    "/assets/styles/pages/front-office/form/_character-cTz1J4O.css",
    "/assets/styles/pages/front-office/character/_index-SzN8Wyh.css",
    "/assets/styles/pages/front-office/character/_create-B2fjbgk.css",
    "/assets/styles/pages/front-office/_home-vZvFU-q.css",
    "/assets/styles/base/_typography-HbBbiXv.css",
    "/assets/styles/base/_reset-Frl8_J3.css",
    "/assets/styles/app-NKa5bLU.css",
    "/assets/icons/symfony-2x-uQcv.svg",
    "/assets/controllers/alert_controller-a-SG1x4.js",
    "/assets/controllers/autoscroll_controller-QxyJOn2.js",
    "/assets/controllers/popup_controller-wAjE7zq.js",
    "/assets/controllers/tooltip_controller-i55K3zX.js",
    "/assets/controllers/csrf_protection_controller-DHNu0WH.js",
    "/assets/app-iDQK6l-.js",
    "/assets/vendor/@hotwired/stimulus/stimulus.index-S4zNcea.js",
    "/assets/vendor/@hotwired/turbo/turbo.index-pT15T6h.js"
].map(
    path =>
      cache_0_0.handleAll({
        event,
        request: new Request(path),
      })[1]
  );
  event.waitUntil(Promise.all(done));
});

/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: CacheFirst
// Match: ({request}) => request.destination === 'font'
// Cache Name: fonts
// Enabled: 1
// Needs Workbox: 1
// Method: GET

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_2_0 = new workbox.strategies.CacheFirst({
  cacheName: 'fonts',plugins: [new workbox.cacheableResponse.CacheableResponsePlugin({
    "statuses": [
        0,
        200
    ]
}), new workbox.expiration.ExpirationPlugin({
    "maxEntries": 60,
    "maxAgeSeconds": 31536000
})]
});
workbox.routing.registerRoute(({request}) => request.destination === 'font',cache_2_0,'GET');
/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: StaleWhileRevalidate
// Match: ({url}) => url.origin === 'https://fonts.googleapis.com'
// Cache Name: google-fonts-stylesheets
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_3_0 = new workbox.strategies.StaleWhileRevalidate({
  cacheName: 'google-fonts-stylesheets',plugins: []
});
workbox.routing.registerRoute(({url}) => url.origin === 'https://fonts.googleapis.com',cache_3_0);
/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: CacheFirst
// Match: ({url}) => url.origin === 'https://fonts.gstatic.com'
// Cache Name: google-fonts-webfonts
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_3_1 = new workbox.strategies.CacheFirst({
  cacheName: 'google-fonts-webfonts',plugins: [new workbox.cacheableResponse.CacheableResponsePlugin({
    "statuses": [
        0,
        200
    ]
}), new workbox.expiration.ExpirationPlugin({
    "maxEntries": 30,
    "maxAgeSeconds": 31536000
})]
});
workbox.routing.registerRoute(({url}) => url.origin === 'https://fonts.gstatic.com',cache_3_1);
/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: CacheFirst
// Match: ({request, url}) => (request.destination === 'image' && !url.pathname.startsWith('/assets'))
// Cache Name: images
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_4_0 = new workbox.strategies.CacheFirst({
  cacheName: 'images',plugins: []
});
workbox.routing.registerRoute(({request, url}) => (request.destination === 'image' && !url.pathname.startsWith('/assets')),cache_4_0);
/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: StaleWhileRevalidate
// Match: ({url}) => '/site.webmanifest' === url.pathname
// Cache Name: manifest
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_5_0 = new workbox.strategies.StaleWhileRevalidate({
  cacheName: 'manifest',plugins: []
});
workbox.routing.registerRoute(({url}) => '/site.webmanifest' === url.pathname,cache_5_0);
/**************************************************** END CACHE STRATEGY ****************************************************/




/**************************************************** CACHE CLEAR ****************************************************/
// The configuration is set to clear the cache on each install event
// The following code will remove all the caches
self.addEventListener("install", function (event) {
    event.waitUntil(caches.keys().then(function (cacheNames) {
            return Promise.all(
                cacheNames.map(function (cacheName) {
                    return caches.delete(cacheName);
                })
            );
        })
    );
});
/**************************************************** END CACHE CLEAR ****************************************************/





/**************************************************** WORKBOX IMPORT ****************************************************/
// The configuration is set to use Workbox
// The following code will import Workbox from CDN or public URL
// Import from public URL

importScripts('/workbox/workbox-sw.js');
workbox.setConfig({modulePathPrefix: '/workbox'});
/**************************************************** END WORKBOX IMPORT ****************************************************/






/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: CacheFirst
// Match: ({url}) => url.pathname.startsWith('/assets')
// Cache Name: assets
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_0_0 = new workbox.strategies.CacheFirst({
  cacheName: 'assets',plugins: [new workbox.expiration.ExpirationPlugin({
    "maxEntries": 968,
    "maxAgeSeconds": 31536000
})]
});
workbox.routing.registerRoute(({url}) => url.pathname.startsWith('/assets'),cache_0_0);
self.addEventListener('install', event => {
  const done = [
    "/assets/@spomky-labs/pwa-bundle/sync-broadcast_controller-2-cTsg3.js",
    "/assets/@spomky-labs/pwa-bundle/prefetch-on-demand_controller-e2Rt_GG.js",
    "/assets/@spomky-labs/pwa-bundle/backgroundsync-form_controller-ynS5Onz.js",
    "/assets/@spomky-labs/pwa-bundle/connection-status_controller-6uY2aFO.js",
    "/assets/@symfony/ux-live-component/live.min-ZJB0GOL.css",
    "/assets/@symfony/ux-live-component/live_controller-ZPUcqp6.js",
    "/assets/@symfony/ux-turbo/turbo_stream_controller-k6A1X0A.js",
    "/assets/@symfony/ux-turbo/turbo_controller-zl4y2v3.js",
    "/assets/@symfony/stimulus-bundle/controllers-rD6mdCN.js",
    "/assets/@symfony/stimulus-bundle/loader-kxG46ja.js",
    "/assets/bootstrap-lMx7M99.js",
    "/assets/img/core/cover-lzFe5t8.webp",
    "/assets/img/core/spell/shield-i8YJTqK.png",
    "/assets/img/core/spell/health-Tt5YR25.png",
    "/assets/img/core/spell/fire-tSLVFuk.png",
    "/assets/img/core/spell/illusion-tijsdZV.png",
    "/assets/img/core/spell/weapon-4bcnoXV.png",
    "/assets/img/core/spell/water-Y1bO1rs.png",
    "/assets/img/core/spell/nature-OxfSS06.png",
    "/assets/img/core/spell/mana-wpPxhbA.png",
    "/assets/img/core/spell/restoration-Bb8Z7hV.png",
    "/assets/img/core/spell/metamorphosis-BTxRWB4.png",
    "/assets/img/core/spell/storm-rQI3myS.png",
    "/assets/img/core/location/encounter-montagne-zojNMZY.webp",
    "/assets/img/core/location/arcanes_thumb-kz3cnfZ.webp",
    "/assets/img/core/location/encounter-foret-p9lAM_-.webp",
    "/assets/img/core/location/temple_thumb-92JCPBp.webp",
    "/assets/img/core/location/encounter-ville-Ir2AzPt.webp",
    "/assets/img/core/location/grotte_thumb-LoGed91.webp",
    "/assets/img/core/location/tunnel_thumb---haLy3.webp",
    "/assets/img/core/location/encounter-plaine-QImLcoa.webp",
    "/assets/img/core/location/maison_thumb-w34BrSP.webp",
    "/assets/img/core/location/encounter-plage-zLKWSxC.webp",
    "/assets/img/core/location/taverne_thumb-FogHQm8.webp",
    "/assets/img/core/location/encounter-desert-QLa1_FE.webp",
    "/assets/img/core/location/forge_thumb-vDisgf6.webp",
    "/assets/img/core/creature/fantome_thumb-h3x214Z.png",
    "/assets/img/core/creature/ours-cendre_thumb-rCWTNwj.png",
    "/assets/img/core/creature/gobelin-chef-QVnqLUl.png",
    "/assets/img/core/creature/gobelin-chef_book-0rF5tYr.png",
    "/assets/img/core/creature/harpie-des-cimes_book-WG-mn93.png",
    "/assets/img/core/creature/gobelin-chef_thumb-VlSOMJp.png",
    "/assets/img/core/creature/fantome_book-2YKh9tR.png",
    "/assets/img/core/creature/sanglier-noir_thumb-cYZoEqg.png",
    "/assets/img/core/creature/bouquetin-feroce_book-tLdAepY.png",
    "/assets/img/core/creature/squelette-de-marin_thumb-jTCo6oI.png",
    "/assets/img/core/creature/ours-cendre_book-FDUEOpG.png",
    "/assets/img/core/creature/harpie-des-cimes_thumb-V9_TgqL.png",
    "/assets/img/core/creature/ame-en-peine_thumb-MfzggCi.png",
    "/assets/img/core/creature/loup_thumb-i2q1awl.png",
    "/assets/img/core/creature/gobelin-chef_alt-s-jJ7Yb.png",
    "/assets/img/core/creature/gobelin-guerrier_book-OW_kUx7.png",
    "/assets/img/core/creature/corbeau-des-brumes_book-za1bRIz.png",
    "/assets/img/core/creature/gros-rat_book-4KuRt1X.png",
    "/assets/img/core/creature/sirene-melancolique_thumb-fehotNV.png",
    "/assets/img/core/creature/ame-en-peine_book--NEHBfG.png",
    "/assets/img/core/creature/squelette-guerrier_book-Dv0EMEv.png",
    "/assets/img/core/creature/squelette-de-marin_book-945cew0.png",
    "/assets/img/core/creature/rat-geant_book-Y5bIOom.png",
    "/assets/img/core/creature/dragon-de-pierre-fqJL4vK.png",
    "/assets/img/core/creature/rat-geant_thumb-2n_nlM_.png",
    "/assets/img/core/creature/sirene-melancolique-QRwZSLZ.png",
    "/assets/img/core/creature/gobelin-guerrier_thumb-SO6ajWV.png",
    "/assets/img/core/creature/squelette-deryl_thumb-j9mtZwI.png",
    "/assets/img/core/creature/dragon-de-pierre_book-uEnBPdT.png",
    "/assets/img/core/creature/bouquetin-feroce_thumb-KJgA6p6.png",
    "/assets/img/core/creature/sirene-melancolique-angry-BYxEM27.png",
    "/assets/img/core/creature/gobelin-eclaireur_thumb-jN_6lD9.png",
    "/assets/img/core/creature/dragon-de-pierre_thumb-m0Sh0nM.png",
    "/assets/img/core/creature/squelette-deryl-NIxXd_-.png",
    "/assets/img/core/creature/sanglier-noir_book-L4biEjV.png",
    "/assets/img/core/creature/sirene_book-cX1g0KH.png",
    "/assets/img/core/creature/gros-rat_thumb-_1-2jf-.png",
    "/assets/img/core/creature/gobelin-eclaireur_book-srIZtU0.png",
    "/assets/img/core/creature/loup_book-_Rhi-K-.png",
    "/assets/img/core/action/rumor-akx3v9z.png",
    "/assets/img/core/action/sing-4lvvDob.png",
    "/assets/img/core/action/cast-4uN1hi3.png",
    "/assets/img/core/action/decline-CN5g6bK.png",
    "/assets/img/core/action/fist-E5BXUy-.png",
    "/assets/img/core/action/talk-vYPM1M5.png",
    "/assets/img/core/action/spell-wpPxhbA.png",
    "/assets/img/core/action/sleep-62Egdwp.png",
    "/assets/img/core/action/steal-XAENOYV.png",
    "/assets/img/core/action/search-KBBFYMw.png",
    "/assets/img/core/action/pray-JJHV88C.png",
    "/assets/img/core/action/angry-ff14453.png",
    "/assets/img/core/action/test-3yiVzWE.png",
    "/assets/img/core/action/flee-Ync3Zi5.png",
    "/assets/img/core/action/walk-FcscdKC.png",
    "/assets/img/core/action/attack-euH26-x.png",
    "/assets/img/core/action/exit-B82j_hX.png",
    "/assets/img/core/action/accept-CrWniUr.png",
    "/assets/img/core/action/trade-yfAoKya.png",
    "/assets/img/core/action/leave-1sobBHn.png",
    "/assets/img/core/action/reload-6Cu9FAq.png",
    "/assets/img/core/action/repair-43y-6Oa.png",
    "/assets/img/core/logo-tYcpRbY.png",
    "/assets/img/core/item/shield/shield_iron-_pT2TfG.png",
    "/assets/img/core/item/shield/shield_steel_enchanted-cYqBbKb.png",
    "/assets/img/core/item/shield/shield_steel-4cgzDgT.png",
    "/assets/img/core/item/shield/shield_wood-ajaAQ6W.png",
    "/assets/img/core/item/shield/shield_iron_enchanted-JfnxFG9.png",
    "/assets/img/core/item/shield/shield_wood_enchanted-A-xifO2.png",
    "/assets/img/core/item/weapon/croc-daskalor-YJRO4Th.png",
    "/assets/img/core/item/weapon/ax_war_enchanted-egNRihm.png",
    "/assets/img/core/item/weapon/bow_short-iTCThrz.png",
    "/assets/img/core/item/weapon/bow_long-UFrUipB.png",
    "/assets/img/core/item/weapon/dagger-vvCFuos.png",
    "/assets/img/core/item/weapon/sword_long-jp7e9xR.png",
    "/assets/img/core/item/weapon/sword_short-BwwhlUJ.png",
    "/assets/img/core/item/weapon/hammer_war_enchanted-MemaRgH.png",
    "/assets/img/core/item/weapon/ax_war-PbTfRGg.png",
    "/assets/img/core/item/weapon/gun-D3xpkUI.png",
    "/assets/img/core/item/weapon/hammer_war-MyHUiau.png",
    "/assets/img/core/item/weapon/magical_wand-1OqVFvU.png",
    "/assets/img/core/item/weapon/sword_long_enchanted-Nw70I1S.png",
    "/assets/img/core/item/weapon/magical_stick-BdE1j0R.png",
    "/assets/img/core/item/weapon/dagger_enchanted-eWikZmO.png",
    "/assets/img/core/item/weapon/fight-stick-Ep1ZTF6.png",
    "/assets/img/core/item/weapon/sword_short_enchanted-JKGRJhY.png",
    "/assets/img/core/item/weapon/bow_short_enchanted-afygIfm.png",
    "/assets/img/core/item/weapon/pickaxe-7iu3h35.png",
    "/assets/img/core/item/weapon/bow_long_enchanted-nqgNY4c.png",
    "/assets/img/core/item/scroll/scroll-8u0DLwK.png",
    "/assets/img/core/item/gift/flowers-n4J-OKh.png",
    "/assets/img/core/item/gift/ring_gold-itEEBGa.png",
    "/assets/img/core/item/gift/ring_silver-39xAuHT.png",
    "/assets/img/core/item/gift/ring_copper-WlIGuA9.png",
    "/assets/img/core/item/amulet/amulette-du-cercle-anVAx--.png",
    "/assets/img/core/item/amulet/coeur-decume-wMzAx2l.png",
    "/assets/img/core/item/amulet/medaillon-des-vents-a2Kdx-_.png",
    "/assets/img/core/item/amulet/amulet-fi7Lhha.png",
    "/assets/img/core/item/map/desert-nWNyyzj.png",
    "/assets/img/core/item/map/city-yv3LUUE.png",
    "/assets/img/core/item/map/forest-0EXaTeZ.png",
    "/assets/img/core/item/map/realm-tuz5Kmb.png",
    "/assets/img/core/item/map/mountain-DBuhWgT.png",
    "/assets/img/core/item/map/village-xBtBOQV.png",
    "/assets/img/core/item/map/dungeon-T5ZJznk.png",
    "/assets/img/core/item/armor/armor_iron-T4X82Rj.png",
    "/assets/img/core/item/armor/armor_robe_druid-TqgFK2R.png",
    "/assets/img/core/item/armor/armor_robe_mage-y-6iXaH.png",
    "/assets/img/core/item/armor/armor_robe_druid_enchanted-aaYko2H.png",
    "/assets/img/core/item/armor/armor_robe_mage_enchanted--3THUze.png",
    "/assets/img/core/item/armor/armor_steel_enchanted-jfv5bhN.png",
    "/assets/img/core/item/armor/armor_iron_enchanted-4pdbdfr.png",
    "/assets/img/core/item/armor/armor_plates_enchanted-AEgluv9.png",
    "/assets/img/core/item/armor/armor_steel-Z5JFNmI.png",
    "/assets/img/core/item/armor/armor_leather_enchanted-SgJygQ5.png",
    "/assets/img/core/item/armor/armor_leather-oZcA4aZ.png",
    "/assets/img/core/item/armor/armor_plates-q80AQpS.png",
    "/assets/img/core/item/food/food_bread-C4Xa5Ie.png",
    "/assets/img/core/item/food/food_chicken-O7qjSEt.png",
    "/assets/img/core/item/food/food_wine-ej9OrYw.png",
    "/assets/img/core/item/food/food_meat-7iTtK7K.png",
    "/assets/img/core/item/food/food_beer-kyZpVPm.png",
    "/assets/img/core/item/food/food_cheese-d9YmXdJ.png",
    "/assets/img/core/item/food/food_fish-nggB_-G.png",
    "/assets/img/core/item/book/book_author-ykNdOQI.png",
    "/assets/img/core/item/book/book_diary-woSFfv2.png",
    "/assets/img/core/item/book/book_letter-tl_LwAY.png",
    "/assets/img/core/item/ring/ring-Ix40V6l.png",
    "/assets/img/core/item/potion/potion_health-FpdTRH7.png",
    "/assets/img/core/item/potion/potion_util-bnGZWFx.png",
    "/assets/img/core/item/potion/potion_mana-B6J-4SA.png",
    "/assets/img/core/item/potion/potion_broken-zVOJKHJ.png",
    "/assets/img/core/screen/jail-rlerGyx.webp",
    "/assets/img/core/reward/chest-z-3RKA-.png",
    "/assets/img/core/reward/royal_box-oOichFD.png",
    "/assets/img/core/reward/gift-TCqEIWq.png",
    "/assets/img/core/pregenerated/lyra-lagile-wSH-QrF.png",
    "/assets/img/core/pregenerated/eryndor-le-vigilant-doQX_4t.png",
    "/assets/img/core/pregenerated/tharasha-la-sauvage_thumb-mO-gotU.png",
    "/assets/img/core/pregenerated/isilea-la-gardienne-to4dcU1.png",
    "/assets/img/core/pregenerated/lyra-lagile_thumb-HzISITf.png",
    "/assets/img/core/pregenerated/elandra-la-sage_thumb-Z-CsiP1.png",
    "/assets/img/core/pregenerated/tharasha-la-sauvage-LcveKLq.png",
    "/assets/img/core/pregenerated/grymm-le-bricoleur_thumb-kgd_2Zt.png",
    "/assets/img/core/pregenerated/thorin-le-feroce-L5LeoOv.png",
    "/assets/img/core/pregenerated/isilea-la-gardienne_thumb-kc8mmbN.png",
    "/assets/img/core/pregenerated/eryndor-le-vigilant_thumb-CvfyLIE.png",
    "/assets/img/core/pregenerated/grymm-le-bricoleur-yLYS7zV.png",
    "/assets/img/core/pregenerated/aldrin-le-brave-efCOpzD.png",
    "/assets/img/core/pregenerated/thorin-le-feroce_thumb-gHTNZXG.png",
    "/assets/img/core/pregenerated/elandra-la-sage-hXFtl3e.png",
    "/assets/img/core/pregenerated/aldrin-le-brave_thumb-27ctfbO.png",
    "/assets/img/core/cover_documentation-FyZ1KQK.png",
    "/assets/img/core/equipment/bow-39XEcaM.png",
    "/assets/img/core/equipment/anneau-es2ySqN.png",
    "/assets/img/core/equipment/nourriture-1N8Q_kU.png",
    "/assets/img/core/equipment/bouclier-nqN-mm-.png",
    "/assets/img/core/equipment/shield-nqN-mm-.png",
    "/assets/img/core/equipment/carte-LTnTkzv.png",
    "/assets/img/core/equipment/potion-4vXtQlD.png",
    "/assets/img/core/equipment/inventory-2RsMM5s.png",
    "/assets/img/core/equipment/divers-nZKYRSA.png",
    "/assets/img/core/equipment/armure-0A4uWS6.png",
    "/assets/img/core/equipment/cadeau-a1AcvQq.png",
    "/assets/img/core/equipment/armor-0A4uWS6.png",
    "/assets/img/core/equipment/parchemin-AG898Ol.png",
    "/assets/img/core/equipment/equipment-z0RkGvG.png",
    "/assets/img/core/equipment/ring-es2ySqN.png",
    "/assets/img/core/equipment/livre-JHvRV9_.png",
    "/assets/img/core/equipment/sword-f9ACnDX.png",
    "/assets/img/core/equipment/arme-magique-lqs1jVV.png",
    "/assets/img/core/equipment/arme-f9ACnDX.png",
    "/assets/img/core/equipment/amulette-Qdm4dWB.png",
    "/assets/img/core/equipment/arc-39XEcaM.png",
    "/assets/img/core/equipment/scroll-AG898Ol.png",
    "/assets/img/core/equipment/amulet-Qdm4dWB.png",
    "/assets/img/core/npc/druide-NPaZTKp.png",
    "/assets/img/core/npc/sbire-9gZBr-i.png",
    "/assets/img/core/npc/chef-malfrat-Ad1mVMs.png",
    "/assets/img/core/npc/nain-mineur-IJwxzHN.png",
    "/assets/img/core/npc/nain-mineur_thumb-E51_jMO.png",
    "/assets/img/core/npc/grand-druide-eEmCTSj.png",
    "/assets/img/core/npc/chef-malfrat_thumb-gLlZvi8.png",
    "/assets/img/core/npc/grand-druide_thumb-a4mkm_E.png",
    "/assets/img/core/npc/sbire_thumb-gomh5c8.png",
    "/assets/img/core/npc/druide_thumb-dp9xxtW.png",
    "/assets/img/chapter1/combat/port-saint-doux-une-bande-de-rats-sur-les-docks-5iu_UA7.webp",
    "/assets/img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge-Z0W4OI-.png",
    "/assets/img/chapter1/combat/bois-du-pendu-druides-de-la-clairiere_thumb-dp9xxtW.png",
    "/assets/img/chapter1/combat/bois-du-pendu-gerome-Cp_yCHk.webp",
    "/assets/img/chapter1/combat/port-saint-doux-une-bande-de-rats-sur-les-docks_thumb-_1-2jf-.png",
    "/assets/img/chapter1/combat/plage-de-la-sirene-squelettes-marins_thumb-j9mtZwI.png",
    "/assets/img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge_thumb-2n9EnOS.png",
    "/assets/img/chapter1/combat/plage-de-la-sirene-squelettes-marins-cOHHWpx.png",
    "/assets/img/chapter1/combat/bois-du-pendu-druides-de-la-clairiere-wfBEDYr.webp",
    "/assets/img/chapter1/combat/plouc-eclaireurs-gobelins-48kZiJG.webp",
    "/assets/img/chapter1/combat/bois-du-pendu-druides-du-bosquet_thumb-3gjmBtt.png",
    "/assets/img/chapter1/combat/bois-du-pendu-druides-du-bosquet-yPy8qjU.webp",
    "/assets/img/chapter1/combat/plouc-eclaireurs-gobelins_thumb-GHo__eZ.png",
    "/assets/img/chapter1/combat/plouc-campement-gobelin--ZL48qr.webp",
    "/assets/img/chapter1/combat/bois-du-pendu-gerome_thumb-WKSzob1.png",
    "/assets/img/chapter1/combat/plouc-campement-gobelin_thumb-GtBgzs9.png",
    "/assets/img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks-9Nl3lYN.webp",
    "/assets/img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks_thumb-2n_nlM_.png",
    "/assets/img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge-ognqCfU.webp",
    "/assets/img/chapter1/location/maison-de-gerard-le-pecheur-vZqo__S.webp",
    "/assets/img/chapter1/location/le-tunnel-de-bardin-zsLhpVq.webp",
    "/assets/img/chapter1/location/rocher-du-dragon-ZfuNmxH.webp",
    "/assets/img/chapter1/location/jardins-de-la-mairie-9DjiA9V.webp",
    "/assets/img/chapter1/location/salle-du-miroir-CnbGXDA.webp",
    "/assets/img/chapter1/location/nuit_docks-de-louest-B4Kct_L.webp",
    "/assets/img/chapter1/location/palais-royal-kl6q0z7.webp",
    "/assets/img/chapter1/location/sables-chauds-kS8yY4V.webp",
    "/assets/img/chapter1/location/refuge-du-bouc-boiteux-BMJ9mlC.webp",
    "/assets/img/chapter1/location/crypte-inversee-QWPAOC-.webp",
    "/assets/img/chapter1/location/la-grotte-OuBAZ3p.webp",
    "/assets/img/chapter1/location/camp-abandonne-sd3-M93.webp",
    "/assets/img/chapter1/location/tombeau-de-galdric-premier-iL3-JKA.webp",
    "/assets/img/chapter1/location/bois-des-relents-cqC4h6r.webp",
    "/assets/img/chapter1/location/nouvelle-ville-6elzf1X.webp",
    "/assets/img/chapter1/location/antichambre-du-roi-by_Dl_g.webp",
    "/assets/img/chapter1/location/bois-du-pendu-NQgE-Fi.webp",
    "/assets/img/chapter1/location/bosquet-des-druides-KSZ8jtx.webp",
    "/assets/img/chapter1/location/grotte-des-echos-wKNqtp4.webp",
    "/assets/img/chapter1/location/palais-royal_thumb-Vp838m3.webp",
    "/assets/img/chapter1/location/quartier-des-chauves-bhqRoaC.webp",
    "/assets/img/chapter1/location/forge-de-port-saint-doux-rZ7yP40.webp",
    "/assets/img/chapter1/location/hotel-de-ville_thumb-41TRWJb.webp",
    "/assets/img/chapter1/location/le-refuge_alt-B4uy_KV.webp",
    "/assets/img/chapter1/location/donjon-de-l-ame_thumb-IeSrPhB.webp",
    "/assets/img/chapter1/location/quartier-du-marche-XWiCGD2.webp",
    "/assets/img/chapter1/location/temple-de-port-saint-doux-tdQITMH.webp",
    "/assets/img/chapter1/location/quartier-des-ploucs-2658hJR.webp",
    "/assets/img/chapter1/location/hall-dentree-Ep4WQNO.webp",
    "/assets/img/chapter1/location/le-refuge-e2CpWZJ.webp",
    "/assets/img/chapter1/location/monts-terribles-CipvVK3.webp",
    "/assets/img/chapter1/location/campement-gobelin_thumb-pAWmTBN.webp",
    "/assets/img/chapter1/location/entree-du-donjon-VAZ-UMe.webp",
    "/assets/img/chapter1/location/salle-des-chaines-avNDmG9.webp",
    "/assets/img/chapter1/location/jardins-de-la-mairie_thumb-b9ElRiY.webp",
    "/assets/img/chapter1/location/gouffre-daskalor-9XSQPy1.webp",
    "/assets/img/chapter1/location/taverne-de-la-flute-moisie-6ViPk98.webp",
    "/assets/img/chapter1/location/maison-de-gerard-le-pecheur_alt-1EayrxT.webp",
    "/assets/img/chapter1/location/entree-du-donjon_alt-mHXLHyL.webp",
    "/assets/img/chapter1/location/port-saint-doux-E_HUf5A.webp",
    "/assets/img/chapter1/location/royaume-de-lile-du-nord-B9FJXJA.webp",
    "/assets/img/chapter1/location/col-du-vent-noir-GKGSD11.webp",
    "/assets/img/chapter1/location/campement-gobelin_alt-iBBTmRp.webp",
    "/assets/img/chapter1/location/hotel-de-ville_alt-05RQkec.webp",
    "/assets/img/chapter1/location/oasis-sans-nom-GFBo9go.webp",
    "/assets/img/chapter1/location/docks-de-louest-i_uOuPi.webp",
    "/assets/img/chapter1/location/arcanes-de-port-saint-doux-bQJQc2t.webp",
    "/assets/img/chapter1/location/plouc-t1fVONa.webp",
    "/assets/img/chapter1/location/quartier-des-ploucs_alt-5oQ0Cpe.webp",
    "/assets/img/chapter1/location/anciens-docks-AVaHd-z.webp",
    "/assets/img/chapter1/location/la-chambre-du-rituel-CIYp4z3.webp",
    "/assets/img/chapter1/location/appartements-royaux-6fqxAiG.webp",
    "/assets/img/chapter1/location/oree-du-bois-3hVGQG-.webp",
    "/assets/img/chapter1/location/campement-gobelin-UzFMf7C.webp",
    "/assets/img/chapter1/location/plage-de-la-sirene-uN6tE9-.webp",
    "/assets/img/chapter1/location/plouc_alt-t1fVONa.webp",
    "/assets/img/chapter1/location/quartier-du-marche_alt-RoEaK8N.webp",
    "/assets/img/chapter1/location/le-gouffre-xW42tJk.webp",
    "/assets/img/chapter1/location/clairiere-de-loublie-Y8E9HI2.webp",
    "/assets/img/chapter1/location/appartements-royaux_thumb-UiGqdnM.webp",
    "/assets/img/chapter1/location/donjon-de-l-ame-u6ALy5T.webp",
    "/assets/img/chapter1/location/hotel-de-ville-mQhIv7w.webp",
    "/assets/img/chapter1/location/vieille-ville-7RjSzvD.webp",
    "/assets/img/chapter1/location/crique-du-pendu-yDzsuFN.webp",
    "/assets/img/chapter1/location/salle-des-murmures-YIqYi1M.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-05-18hVd1W.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-04-ITB6Mdu.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-03-qpYQLMy.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-02-p7LTdfS.webp",
    "/assets/img/chapter1/riddle/bosquet-des-druides-test-01-TBrtfdJ.webp",
    "/assets/img/chapter1/creature/gerome-le-pendu-1ts5dhz.png",
    "/assets/img/chapter1/creature/nashore_book-MZU0TK6.png",
    "/assets/img/chapter1/creature/nashore-ANnrMaJ.png",
    "/assets/img/chapter1/creature/gerome-le-pendu_thumb-KACQzMb.png",
    "/assets/img/chapter1/creature/nashore_thumb-EwgqOgq.png",
    "/assets/img/chapter1/map/bois-du-pendu-d-OEly2.png",
    "/assets/img/chapter1/map/plouc-eow4L-Z.png",
    "/assets/img/chapter1/map/sables-chauds-9wd_Mvl.png",
    "/assets/img/chapter1/map/donjon-de-lame_old-x3BxBLu.png",
    "/assets/img/chapter1/map/royaume-de-l-ile-du-nord-e5SLqn0.png",
    "/assets/img/chapter1/map/monts-terribles-m7fI4QQ.png",
    "/assets/img/chapter1/map/port-saint-doux-v_slvFX.png",
    "/assets/img/chapter1/map/donjon-de-lame-EnCNfAA.png",
    "/assets/img/chapter1/npc/maire-de-port-saint-doux_alt-wCg3Jho.png",
    "/assets/img/chapter1/npc/pecheur-du-quartier-des-ploucs_thumb-AOoQgFl.png",
    "/assets/img/chapter1/npc/grand-pretre-de-port-saint-doux_thumb-jJB0QcI.png",
    "/assets/img/chapter1/npc/myra-la-vieille-w0TyloD.png",
    "/assets/img/chapter1/npc/bilo-le-passant-angry-gYmkZFT.png",
    "/assets/img/chapter1/npc/roi-galdric_thumb-jsxE4Nk.png",
    "/assets/img/chapter1/npc/theobald-le-gris-murmure_thumb-1k2el7L.png",
    "/assets/img/chapter1/npc/farouk-le-nomade-J-dwCjq.png",
    "/assets/img/chapter1/npc/jarrod-le-tavernier-angry-2ZhCPIh.png",
    "/assets/img/chapter1/npc/tharol-le-silencieux-tqGTkiO.png",
    "/assets/img/chapter1/npc/maire-de-port-saint-doux-FpB9UU5.png",
    "/assets/img/chapter1/npc/prince-alaric_thumb-oPsaLTV.png",
    "/assets/img/chapter1/npc/farouk-le-nomade_thumb-rPWFOF3.png",
    "/assets/img/chapter1/npc/bilo-le-passant-Lkg0ajV.png",
    "/assets/img/chapter1/npc/maire-de-port-saint-doux_thumb-HhiYpGA.png",
    "/assets/img/chapter1/npc/roi-galdric-hZlzBxM.png",
    "/assets/img/chapter1/npc/bilo-le-passant_thumb-qdgl40T.png",
    "/assets/img/chapter1/npc/garde-du-quartier-des-chauves_thumb-AOfUH6h.png",
    "/assets/img/chapter1/npc/servante-du-palais-zQuQOUL.png",
    "/assets/img/chapter1/npc/sophie-la-marchande-bsSSQ1I.png",
    "/assets/img/chapter1/npc/prince-alaric-8LOlk1s.png",
    "/assets/img/chapter1/npc/robert-le-garde-CUbkSmN.png",
    "/assets/img/chapter1/npc/bilo-le-passant_alt--Wt4Buj.png",
    "/assets/img/chapter1/npc/jarrod-le-tavernier_thumb-jbsmFG4.png",
    "/assets/img/chapter1/npc/theobald-le-gris-murmure-ed6rBur.png",
    "/assets/img/chapter1/npc/grand-pretre-de-port-saint-doux-reE0pul.png",
    "/assets/img/chapter1/npc/gart-le-forgeron-3nSIQXn.png",
    "/assets/img/chapter1/npc/robert-le-garde-angry-4r9P0jM.png",
    "/assets/img/chapter1/npc/prince-alaric_alt-IG-Zp3h.png",
    "/assets/img/chapter1/npc/faux-djinn-lJHLHZE.png",
    "/assets/img/chapter1/npc/wilbert-larcaniste-Y-Eeubm.png",
    "/assets/img/chapter1/npc/gerard-le-pecheur_thumb-eZKOrWh.png",
    "/assets/img/chapter1/npc/pecheur-du-quartier-des-ploucs_alt-yzpZMIK.png",
    "/assets/img/chapter1/npc/myra-la-vieille_thumb-tlChxHM.png",
    "/assets/img/chapter1/npc/sophie-la-marchande-angry-2GBeexe.png",
    "/assets/img/chapter1/npc/faux-djinn_thumb-XbggepW.png",
    "/assets/img/chapter1/npc/garde-du-palais_thumb-IFoqyGC.png",
    "/assets/img/chapter1/npc/gart-le-forgeron_thumb-YSOWP_E.png",
    "/assets/img/chapter1/npc/servante-du-palais_thumb-R2IdlhS.png",
    "/assets/img/chapter1/npc/pecheur-du-quartier-des-ploucs-JYBQuFv.png",
    "/assets/img/chapter1/npc/gerard-le-pecheur-uI7z3UY.png",
    "/assets/img/chapter1/npc/garde-du-palais-SmetRnk.png",
    "/assets/img/chapter1/npc/robert-le-garde_thumb-yyJTqnM.png",
    "/assets/img/chapter1/npc/wilbert-larcaniste_thumb-oRm8pUd.png",
    "/assets/img/chapter1/npc/garde-du-quartier-des-chauves-KsAURlN.png",
    "/assets/img/chapter1/npc/jarrod-le-tavernier-8dN3znb.png",
    "/assets/img/chapter1/npc/tharol-le-silencieux_thumb-rMtBpur.png",
    "/assets/img/chapter1/npc/sophie-la-marchande_thumb-QfaMB0H.png",
    "/assets/styles/layout/_index-4rNZYSK.css",
    "/assets/styles/layout/form/_index-cvBv9ig.css",
    "/assets/styles/layout/form/_group-7PhXRGn.css",
    "/assets/styles/layout/form/_fieldset-HXgDX9n.css",
    "/assets/styles/layout/character/levelup/_index-VLcZA_T.css",
    "/assets/styles/layout/character/levelup/content/_index-6x4z3Tu.css",
    "/assets/styles/layout/character/levelup/content/_spells-_dPaG7z.css",
    "/assets/styles/layout/character/levelup/content/details/metrics/_index-CeZNmtV.css",
    "/assets/styles/layout/character/levelup/content/details/metrics/_characteristics-kdjf8Wt.css",
    "/assets/styles/layout/character/levelup/content/details/metrics/_attributes-DDdSRPT.css",
    "/assets/styles/layout/character/levelup/content/details/_index-9nJAm4V.css",
    "/assets/styles/layout/character/levelup/content/details/_description-kTswge1.css",
    "/assets/styles/layout/character/levelup/content/details/_level-3mqmpW1.css",
    "/assets/styles/layout/character/sheet/_index-XQJQEP_.css",
    "/assets/styles/layout/character/sheet/content/_index-Ny-KdGF.css",
    "/assets/styles/layout/character/sheet/content/_inventory-lAbOspe.css",
    "/assets/styles/layout/character/sheet/content/_spells-dlxHAf0.css",
    "/assets/styles/layout/character/sheet/content/_equipment-rkb4Hcp.css",
    "/assets/styles/layout/character/sheet/content/details/metrics/_index-CeZNmtV.css",
    "/assets/styles/layout/character/sheet/content/details/metrics/_characteristics--AD_3iW.css",
    "/assets/styles/layout/character/sheet/content/details/metrics/_attributes-nGdk54S.css",
    "/assets/styles/layout/character/sheet/content/details/_index-9nJAm4V.css",
    "/assets/styles/layout/character/sheet/content/details/_description-WPPBUE2.css",
    "/assets/styles/layout/character/sheet/content/details/_level--GGRmXe.css",
    "/assets/styles/layout/character/sheet/content/_quests-i_ahq_E.css",
    "/assets/styles/layout/character/sheet/_footer-8_vY_TM.css",
    "/assets/styles/layout/character/sheet/_header--Grz5_k.css",
    "/assets/styles/layout/_main-PQij6-8.css",
    "/assets/styles/layout/map/_index-oD8ggiC.css",
    "/assets/styles/layout/map/content/_index-Y1Eypo_.css",
    "/assets/styles/layout/map/content/_walk-7PExzot.css",
    "/assets/styles/layout/map/content/_location-OnrXi8K.css",
    "/assets/styles/layout/map/content/_travel-pgjmCjF.css",
    "/assets/styles/layout/map/content/_realm-1MUgbMq.css",
    "/assets/styles/layout/map/_footer-1jwwR_I.css",
    "/assets/styles/layout/map/_header-QeJMpYG.css",
    "/assets/styles/layout/_grid-78pwuMx.css",
    "/assets/styles/layout/screen/_index-gnexpqH.css",
    "/assets/styles/layout/screen/footer/_index-znW1gRB.css",
    "/assets/styles/layout/screen/footer/_actions-z6kNC85.css",
    "/assets/styles/layout/screen/footer/_description-Ck3IW15.css",
    "/assets/styles/layout/screen/footer/_replies-la9KHMT.css",
    "/assets/styles/layout/screen/trade/_index-8lQGO9N.css",
    "/assets/styles/layout/screen/trade/main/_index-uS-5c_Z.css",
    "/assets/styles/layout/screen/trade/header/_index-Es0ctpN.css",
    "/assets/styles/layout/screen/trade/header/_infos-5SEcL9R.css",
    "/assets/styles/layout/screen/reload/_index-ZufLg2t.css",
    "/assets/styles/layout/screen/reload/main/_index-0wSSJje.css",
    "/assets/styles/layout/screen/cinematic/_index-6mUMamT.css",
    "/assets/styles/layout/screen/cinematic/_footer-sVHjzzS.css",
    "/assets/styles/layout/screen/cinematic/_section-VVhzS0c.css",
    "/assets/styles/layout/screen/cinematic/_header-0wzwuBH.css",
    "/assets/styles/layout/screen/main/_index-SV0hzzv.css",
    "/assets/styles/layout/screen/repair/_index-17n9HDM.css",
    "/assets/styles/layout/screen/repair/main/_index-g1F3CX6.css",
    "/assets/styles/layout/screen/header/_index-C4y4xtM.css",
    "/assets/styles/layout/screen/header/_title-7mbq3C_.css",
    "/assets/styles/layout/screen/header/_infos-wZGjO2R.css",
    "/assets/styles/layout/_section-yfVUUdW.css",
    "/assets/styles/layout/_header-a9Sk9XU.css",
    "/assets/styles/utils/_variables-rJ3zuTC.css",
    "/assets/styles/utils/_animations-09LWoq5.css",
    "/assets/styles/utils/_extends-abnkJAv.css",
    "/assets/styles/utils/_mixins-SW6dTPn.css",
    "/assets/styles/components/_gauge-Ywtjcxt.css",
    "/assets/styles/components/form/_legend-ZheeMF-.css",
    "/assets/styles/components/form/_label-6ZnfeNx.css",
    "/assets/styles/components/form/_control-5DXloN-.css",
    "/assets/styles/components/form/_file-gFDf2od.css",
    "/assets/styles/components/form/_error-DvXmWNX.css",
    "/assets/styles/components/form/_help-Vb44BlJ.css",
    "/assets/styles/components/tooltip/_index-VlFZt8e.css",
    "/assets/styles/components/tooltip/_book-PR-UCeA.css",
    "/assets/styles/components/card/_index--vbQW8M.css",
    "/assets/styles/components/card/_item-9yuOnb7.css",
    "/assets/styles/components/card/_character-nJSxkBf.css",
    "/assets/styles/components/card/_spell-xboYo95.css",
    "/assets/styles/components/_popup-5KyGciu.css",
    "/assets/styles/components/button/_cta-Z3z0RPX.css",
    "/assets/styles/components/button/_index-WaNA0RN.css",
    "/assets/styles/components/button/_outline-HPY2Dd-.css",
    "/assets/styles/components/button/_back-XdLSuQ0.css",
    "/assets/styles/components/_icon-fK1vWL9.css",
    "/assets/styles/components/wallpaper/_index-ib3qYQ4.css",
    "/assets/styles/components/wallpaper/_coverimg-MoneIXH.css",
    "/assets/styles/components/wallpaper/_overlay-yX6FaFk.css",
    "/assets/styles/components/_alert-OBCCzU_.css",
    "/assets/styles/pages/character/_index-WCSrsg-.css",
    "/assets/styles/pages/character/_levelup-RDg_SKw.css",
    "/assets/styles/pages/character/_sheet-wIKqFIC.css",
    "/assets/styles/pages/game/_index-sZDCno7.css",
    "/assets/styles/pages/map/_index-PphW3IP.css",
    "/assets/styles/pages/front-office/_index-YHpYm1K.css",
    "/assets/styles/pages/front-office/form/_index-gaz66rp.css",
    "/assets/styles/pages/front-office/form/_register-ulCHCZT.css",
    "/assets/styles/pages/front-office/form/_login-DUnb5hd.css",
    "/assets/styles/pages/front-office/form/_profile-CQM0ZcT.css",
    "/assets/styles/pages/front-office/form/_character-cTz1J4O.css",
    "/assets/styles/pages/front-office/character/_index-SzN8Wyh.css",
    "/assets/styles/pages/front-office/character/_create-B2fjbgk.css",
    "/assets/styles/pages/front-office/_home-vZvFU-q.css",
    "/assets/styles/base/_typography-HbBbiXv.css",
    "/assets/styles/base/_reset-Frl8_J3.css",
    "/assets/styles/app-NKa5bLU.css",
    "/assets/icons/symfony-2x-uQcv.svg",
    "/assets/controllers/alert_controller-a-SG1x4.js",
    "/assets/controllers/autoscroll_controller-QxyJOn2.js",
    "/assets/controllers/popup_controller-wAjE7zq.js",
    "/assets/controllers/tooltip_controller-i55K3zX.js",
    "/assets/controllers/csrf_protection_controller-DHNu0WH.js",
    "/assets/app-iDQK6l-.js",
    "/assets/vendor/@hotwired/stimulus/stimulus.index-S4zNcea.js",
    "/assets/vendor/@hotwired/turbo/turbo.index-pT15T6h.js"
].map(
    path =>
      cache_0_0.handleAll({
        event,
        request: new Request(path),
      })[1]
  );
  event.waitUntil(Promise.all(done));
});

/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: CacheFirst
// Match: ({request}) => request.destination === 'font'
// Cache Name: fonts
// Enabled: 1
// Needs Workbox: 1
// Method: GET

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_2_0 = new workbox.strategies.CacheFirst({
  cacheName: 'fonts',plugins: [new workbox.cacheableResponse.CacheableResponsePlugin({
    "statuses": [
        0,
        200
    ]
}), new workbox.expiration.ExpirationPlugin({
    "maxEntries": 60,
    "maxAgeSeconds": 31536000
})]
});
workbox.routing.registerRoute(({request}) => request.destination === 'font',cache_2_0,'GET');
/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: StaleWhileRevalidate
// Match: ({url}) => url.origin === 'https://fonts.googleapis.com'
// Cache Name: google-fonts-stylesheets
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_3_0 = new workbox.strategies.StaleWhileRevalidate({
  cacheName: 'google-fonts-stylesheets',plugins: []
});
workbox.routing.registerRoute(({url}) => url.origin === 'https://fonts.googleapis.com',cache_3_0);
/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: CacheFirst
// Match: ({url}) => url.origin === 'https://fonts.gstatic.com'
// Cache Name: google-fonts-webfonts
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_3_1 = new workbox.strategies.CacheFirst({
  cacheName: 'google-fonts-webfonts',plugins: [new workbox.cacheableResponse.CacheableResponsePlugin({
    "statuses": [
        0,
        200
    ]
}), new workbox.expiration.ExpirationPlugin({
    "maxEntries": 30,
    "maxAgeSeconds": 31536000
})]
});
workbox.routing.registerRoute(({url}) => url.origin === 'https://fonts.gstatic.com',cache_3_1);
/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: CacheFirst
// Match: ({request, url}) => (request.destination === 'image' && !url.pathname.startsWith('/assets'))
// Cache Name: images
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_4_0 = new workbox.strategies.CacheFirst({
  cacheName: 'images',plugins: []
});
workbox.routing.registerRoute(({request, url}) => (request.destination === 'image' && !url.pathname.startsWith('/assets')),cache_4_0);
/**************************************************** END CACHE STRATEGY ****************************************************/





/**************************************************** CACHE STRATEGY ****************************************************/
// Strategy: StaleWhileRevalidate
// Match: ({url}) => '/site.webmanifest' === url.pathname
// Cache Name: manifest
// Enabled: 1
// Needs Workbox: 1
// Method: 

// 1. Creation of the Workbox Cache Strategy object
// 2. Register the route with the Workbox Router
// 3. Add the assets to the cache when the service worker is installed
const cache_5_0 = new workbox.strategies.StaleWhileRevalidate({
  cacheName: 'manifest',plugins: []
});
workbox.routing.registerRoute(({url}) => '/site.webmanifest' === url.pathname,cache_5_0);
/**************************************************** END CACHE STRATEGY ****************************************************/




/**************************************************** CACHE CLEAR ****************************************************/
// The configuration is set to clear the cache on each install event
// The following code will remove all the caches
self.addEventListener("install", function (event) {
    event.waitUntil(caches.keys().then(function (cacheNames) {
            return Promise.all(
                cacheNames.map(function (cacheName) {
                    return caches.delete(cacheName);
                })
            );
        })
    );
});
/**************************************************** END CACHE CLEAR ****************************************************/



