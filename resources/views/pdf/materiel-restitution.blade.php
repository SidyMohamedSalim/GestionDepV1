<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Décharge de matériel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin-bottom: 30px;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }

        .hero {
            width: 100%;
        }

        .hero img {
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="hero">
            <img src="hero.png" alt="img" />
        </div>
        <div class="header">
            <h2>Décharge restitution matériel</h2>
        </div>
        <div class="content">
            <p>Date: <span>{{-- date --}}</span></p>
            <p>Je soussigné(e) <span>{{ $enseignant->nom }} {{ $enseignant->prenom }} de la personne</span>, déclare
                avoir restitué le matériel suivant :</p>
            <table>
                <thead>
                    <tr>
                        <th>Numero Inventaire</th>
                        <th>Matériel</th>
                        <th>Description</th>
                        <th>Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $materiel->numero_inventaire }}</td>
                        <td>{{ $materiel->materiel->designation }}</td>
                        <td>{{ $materiel->caracteristiques }}</td>
                        <td>{{ $quantite }}</td>
                    </tr>

                    <!-- Ajoutez d'autres lignes pour plus de matériel si nécessaire -->
                </tbody>
            </table>
            <p>Je m'engage à utiliser ce matériel conformément aux règles et aux procédures établies par l'entreprise.
            </p>
        </div>
        <div class="signature">
            <p>Fait à ________, le ____/____/______</p>
            <p>Signature : _________________________</p>
        </div>
        <div class="footer">
            <p>Adresse de l'entreprise - Téléphone: 0123456789 - Email: contact@entreprise.com</p>
        </div>
    </div>
</body>

</html>