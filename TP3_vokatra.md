# TP 3 — Du modele conceptuel au schema relationnel (MLD)

## ETU004141 & ETU004220

# Travail 1 — Tables

- **FOKONTANY**(code_fokontany, nom_fokontany, commune)
- **SOCIETAIRE**(num_adhesion, nom_societaire, tel_societaire, date_adhesion, statut_societaire)
- **PRODUIT**(code_produit, nom_produit, categorie_produit, unite, prix_kg_ar)
- **CAMPAGNE**(code_campagne, debut_campagne, fin_campagne)
- **LIVRAISON**(num_livraison, date_livraison, quantite_kg)

# Travail 2 — Cle etrangere HABITER

Le cote *1* est *FOKONTANY* et le cote *N* est *SOCIETAIRE*.

La cle code_fokontany migre dans la table *SOCIETAIRE*.

**SOCIETAIRE**(num_adhesion, nom_societaire, tel_societaire, date_adhesion, statut_societaire, #code_fokontany)

Pourquoi ne pas mettre la liste des societaires dans FOKONTANY ?

Parce qu'une colonne d'une table ne peut contenir qu'une seule valeur.

# Travail 3 — Entite associative LIVRAISON

## Cles etrangeres

- #num_adhesion → SOCIETAIRE
- #code_produit → PRODUIT
- #code_campagne → CAMPAGNE

## Choix de la cle primaire

Deux possibilites existent :

1. (num_adhesion, code_produit, code_campagne)
2. num_livraison

La premiere solution empeche un societaire d'effectuer plusieurs livraisons du meme produit pendant une meme campagne.

La cooperative autorise ce cas.

**Choix retenu : num_livraison**.

### Table complete

**LIVRAISON**(num_livraison, date_livraison, quantite_kg, #num_adhesion, #code_produit, #code_campagne)

# Travail 4 — Contraintes

## Colonnes obligatoires

- FOKONTANY : code_fokontany, nom_fokontany, commune
- SOCIETAIRE : num_adhesion, nom_societaire, date_adhesion, statut_societaire, code_fokontany
- PRODUIT : code_produit, nom_produit, categorie_produit, unite, prix_kg_ar
- CAMPAGNE : code_campagne, debut_campagne, fin_campagne
- LIVRAISON : num_livraison, date_livraison, quantite_kg, num_adhesion, code_produit, code_campagne

## Valeurs controlees

- statut_societaire ∈ {actif, inactif}
- categorie_produit ∈ {cereale, epice}
- unite = kg

## Informations stockees

- Le prix du riz est stocke dans *PRODUIT.prix_kg_ar*.
- Le telephone d'un societaire est stocke dans *SOCIETAIRE.tel_societaire*.
- Le montant n'est pas stocke ; il est calcule : *prix_kg_ar × quantite_kg*.

# Travail 5 — Ventilation d'une ligne

Exemple : 05/03/2024 – Rakoto Jean – Riz – 150 kg – Campagne 2024-A

## FOKONTANY

| code_fokontany | nom_fokontany | commune |
|---|---|---|
| FK01 | Ambohibary | Manjakandriana |

## SOCIETAIRE

| num_adhesion | nom | telephone | #code_fokontany |
|---|---|---|---|
| S001 | Rakoto Jean | 0341111111 | FK01 |

## PRODUIT

| code_produit | nom | categorie | unite | prix_kg_ar |
|---|---|---|---|---|
| P01 | Riz | Cereale | kg | 6000 |

## CAMPAGNE

| code_campagne | debut | fin |
|---|---|---|
| 2024-A | 01/01/2024 | 31/12/2024 |

## LIVRAISON

| num_livraison | date_livraison | quantite_kg | #num_adhesion | #code_produit | #code_campagne |
|---|---|---|---|---|---|
| L001 | 05/03/2024 | 150 | S001 | P01 | 2024-A |

# Schema relationnel final

- FOKONTANY(code_fokontany, nom_fokontany, commune)
- SOCIETAIRE(num_adhesion, nom_societaire, tel_societaire, date_adhesion, statut_societaire, #code_fokontany)
- PRODUIT(code_produit, nom_produit, categorie_produit, unite, prix_kg_ar)
- CAMPAGNE(code_campagne, debut_campagne, fin_campagne)
- LIVRAISON(num_livraison, date_livraison, quantite_kg, #num_adhesion, #code_produit, #code_campagne)

# Justification

Nous choisissons *num_livraison* comme cle primaire de LIVRAISON, car on pense qu'un societaire peut effectuer plusieurs livraisons du meme produit pendant une meme campagne. Une cle composee empecherait cette situation.
