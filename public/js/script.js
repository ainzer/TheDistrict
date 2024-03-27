
    // Fonction pour marquer la page active dans la barre de navigation
    function markActivePage() {
        var currentPage = window.location.pathname.split("/").pop(); // Obtient le nom de la page à partir de l'URL
        var navLinks = $(".navbar-nav .nav-item a");

        navLinks.each(function () {
            var linkPage = $(this).attr("href");

            if (linkPage === currentPage) {
                $(this).parent().addClass("active");
            }
        });
    }

    /* function loadAndSearch() {
        function performSearch(input) {
            var matchingCategories = jsonData.categorie.filter(function (categorie) {
                return categorie.libelle.toLowerCase().includes(input.toLowerCase());
            });

            categories.forEach(function (category) {
                var newCard = $("<div class='col-md-4 d-flex justify-content-center justify-content-md-between mb-4'>" +
                    "<div class='card zoom-image'>" +
                    "<img src='../image/category/" + category.image + "' class='categories-img-top card-img' alt='Image de la carte'>" +
                    "<div class='card-body'>" +
                    "<h5 class='categories-title'>" + category.libelle + "</h5>" +
                    "<span class='badge rounded-pill'></span>" +
                    "</div>" +
                    "</div>" +
                    "</div>");

                categoryContainer.append(newCard);

                var badgeElement = newCard.find(".badge");
                badgeElement.text(category.active === 'Yes' ? 'Yes' : 'No');
                badgeElement.removeClass('text-bg-success text-bg-danger');
                badgeElement.addClass(category.active === 'Yes' ? 'text-bg-success' : 'text-bg-danger');

                if (category.active === 'Yes') {
                    newCard.on('click', function () {
                        var nouvellePage = 'platCategorie.php?id=' + category.id_categorie;
                        window.location.href = nouvellePage;
                    });
                }
            });

            updateSearchResults(matchingCategories);
        }

        function updateSearchResults(results) {
            $("#searchInput").autocomplete({
                source: results.map(function (categorie) {
                    return categorie.libelle;
                }),
                select: function (event, ui) {
                    var selectedCategorie = jsonData.categorie.find(function (categorie) {
                        return categorie.libelle === ui.item.label;
                    });
                    console.log("Sélection via Autocomplete");
                    window.location.href = "platCategorie.php?id=" + selectedCategorie.id_categorie;
                },
            });
        }

        $("#searchButton").on("click", function (e) {
            e.preventDefault();
            var inputValue = $("#searchInput").val();
            performSearch(inputValue);
            var selectedCategorie = jsonData.categorie.find(function (categorie) {
                return categorie.libelle.toLowerCase() === $("#searchInput").val().toLowerCase();
            });
            window.location.href = "platCategorie.php?id=" + selectedCategorie.id_categorie;
        });

        $("#searchInput").on("keypress", function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var inputValue = $(this).val();
                performSearch(inputValue);
                var selectedCategorie = jsonData.categorie.find(function (categorie) {
                    return categorie.libelle.toLowerCase() === $("#searchInput").val().toLowerCase();
                });
                window.location.href = "platCategorie.php?id=" + selectedCategorie.id_categorie;
            }
        });
    } */

    // Fonction pour charger les catégories avec pagination
    function loadCategories(currentPage) {
        var categories = jsonData.categorie;
        var categoryContainer = $("#cartesCategories");

        // Calculer l'index de départ pour la pagination
        var startIndex = (currentPage - 1) * categoriesPerPage;
        // Calculer l'index de fin pour la pagination
        var endIndex = startIndex + categoriesPerPage;
        // Limiter le nombre de catégories à afficher à la plage actuelle
        var categoriesToShow = categories.slice(startIndex, endIndex);

        categoryContainer.empty(); // Vider le conteneur des catégories

        categoriesToShow.forEach(function (category) {
            var newCard = $("<div class='col-md-4 d-flex justify-content-center justify-content-md-between mb-4'>" +
                "<div class='card zoom-image'>" +
                "<img src='../image/category/" + category.image + "' class='categories-img-top card-img' alt='Image de la carte'>" +
                "<div class='card-body'>" +
                "<h5 class='categories-title'>" + category.libelle + "</h5>" +
                "<span class='badge rounded-pill'></span>" +
                "</div>" +
                "</div>" +
                "</div>");

            categoryContainer.append(newCard);

            var badgeElement = newCard.find(".badge");
            badgeElement.text(category.active === 'Yes' ? 'Yes' : 'No');
            badgeElement.removeClass('text-bg-success text-bg-danger');
            badgeElement.addClass(category.active === 'Yes' ? 'text-bg-success' : 'text-bg-danger');

            if (category.active === 'Yes') {
                (function (category) {
                    newCard.on('click', function () {
                        var nouvellePage = 'platCategorie.php?id=' + category.id_categorie;
                        window.location.href = nouvellePage;
                    });
                })(category);
            }
        });

        var totalPage = Math.ceil(categories.length / categoriesPerPage);

        // Gestionnaire d'événements pour le bouton "Suivant"
        $("#suivantButton").on("click", function () {
            // alert("Page en cours avant incrément : "+currentPage);
            currentPage++; // Incrémenter le numéro de page
            // alert("Page après incrément : "+currentPage);
            loadCategories(currentPage); // Charger les catégories de la page suivante

            // Désactiver le bouton "Suivant" si on est sur la dernière page
            if (currentPage === totalPage) {
                $(this).prop("disabled", true);
            }

            // Activer le bouton "Précédent" après avoir cliqué sur "Suivant"
            $("#precedentButton").prop("disabled", false);
        });

        // Gestionnaire d'événements pour le bouton "Précédent"
        $("#precedentButton").on("click", function () {
            // alert("Page en cours avant décrément : "+currentPage);
            currentPage = currentPage - 1; // Décrémenter le numéro de page
            // alert("Page après décrément : "+currentPage);
            loadCategories(currentPage); // Charger les catégories de la page précédente

            // Désactiver le bouton "Précédent" si on est sur la première page
            if (currentPage === 1) {
                $(this).prop("disabled", true);
                // Activer le bouton "Suivant" après avoir cliqué sur "Précédent"
                $("#suivantButton").prop("disabled", false);
            }
        });
    }

    function loadCategoryPlats() {
        var urlParams = new URLSearchParams(window.location.search);
        var categoryId = urlParams.get('id');
    
        var categoryPlats = jsonData.plat.filter(function (plat) {
            return plat.id_categorie == categoryId && plat.active === "Yes";
        });
    
        if (categoryPlats.length > 0) {
            categoryPlats.forEach(function (plat) {
                var platCategoryCard = $("<div class='col-md-4 d-flex justify-content-center justify-content-md-end mb-5'>" +
                    "<div class='card zoom-image'>" +
                    "<img src='../image/food/" + plat.image + "' class='plat-img-top card-img' alt='Image du plat'>" +
                    "<div class='card-body'>" +
                    "<h5 class='plat-title'>" + plat.libelle + "</h5>" +
                    "<p class='plat-description'>" + plat.description + "</p>" +
                    "<p class='plat-price'>Prix: " + plat.prix + "€</p>" +
                    "<button class='btn btn-primary btn-commande' data-id='" + plat.id_plat + "'>Commander</button>" +
                    "</div>" +
                    "</div>" +
                    "</div>");
    
                platCategoryCard.find(".btn-commande").on('click', function () {
                    var platId = $(this).data("id");
                    var nouvellePage = 'commande.php?id=' + platId; // Remplace 'pageCommande.php' par le chemin correct de ta page de commande
                    window.location.href = nouvellePage;
                });
    
                $('#categoryContent').append(platCategoryCard);
            });
        } else {
            $('#categoryContent').html("<p>Aucun plat actif trouvé pour cette catégorie</p>");
        }
    }

    // Fonction pour charger tous les plats
    function loadPlats(currentPagePlats) {
        var plats = jsonData.plat;
        var platContainer = $("#cartesPlats");
    
        // Calculer l'index de départ pour la pagination des plats
        var startIndex = (currentPagePlats - 1) * categoriesPerPage;
        // Calculer l'index de fin pour la pagination des plats
        var endIndex = startIndex + categoriesPerPage;
        // Limiter le nombre de plats à afficher à la plage actuelle
        var platsToShow = plats.slice(startIndex, endIndex);
    
        platContainer.empty(); // Vider le conteneur des plats
    
        platsToShow.forEach(function (plat) {
    
            var platCard = $("<div class='col-md-4 d-flex justify-content-center justify-content-md-end mb-5'>" +
                "<div class='card zoom-image'>" +
                "<img src='../image/food/" + plat.image + "' class='plat-img-top card-img' alt='Image du plat'>" +
                "<div class='card-body'>" +
                "<h5 class='plat-title'>" + plat.libelle + "</h5>" +
                "<p class='plat-description'>" + plat.description + "</p>" +
                "<p class='plat-price'>Prix: " + plat.prix + "€</p>" +
                "<button class='btn btn-primary btn-commande' data-id='" + plat.id_plat + "'>Commander</button>" +
                "</div>" +
                "</div>" +
                "</div>");
    
            platCard.find(".btn-commande").on('click', function () {
                var platId = $(this).data("id");
                var nouvellePage = 'commande.php?id=' + platId; // Remplace 'pageCommande.php' par le chemin correct de ta page de commande
                window.location.href = nouvellePage;
            });
    
            platContainer.append(platCard);
        });
    
        // Calculer le nombre total de pages pour les plats
        var totalPagePlats = Math.ceil(plats.length / categoriesPerPage);
    
        // Gestionnaire d'événements pour le bouton "Suivant" dans loadPlats
        $("#suivantPlatsButton").on("click", function () {
            currentPagePlats++; // Incrémenter le numéro de page
            loadPlats(currentPagePlats); // Charger les plats de la page suivante
    
            // Désactiver le bouton "Suivant" si on est sur la dernière page
            if (currentPagePlats === totalPagePlats) {
                $(this).prop("disabled", true);
            }
    
            // Activer le bouton "Précédent" après avoir cliqué sur "Suivant"
            $("#precedentPlatsButton").prop("disabled", false);
        });
    
        // Gestionnaire d'événements pour le bouton "Précédent" dans loadPlats
        $("#precedentPlatsButton").on("click", function () {
            currentPagePlats--; // Décrémenter le numéro de page
            loadPlats(currentPagePlats); // Charger les plats de la page précédente
    
            // Désactiver le bouton "Précédent" si on est sur la première page
            if (currentPagePlats === 1) {
                $(this).prop("disabled", true);
            }
    
            // Activer le bouton "Suivant" après avoir cliqué sur "Précédent"
            $("#suivantPlatsButton").prop("disabled", false);
        });
    }
    

    function loadSelectedPlat() {
        var urlParams = new URLSearchParams(window.location.search);
        var platId = urlParams.get('id');

        var plat = jsonData.plat.find(function (item) {
            return item.id_plat == platId;
        });

        if (plat) {
            $("#selectedPlatImage").attr("src", "../image/food/" + plat.image);
            $("#selectedPlatTitle").text(plat.libelle);
            $("#selectedPlatDescription").text(plat.description);
            $("#selectedPlatPrice").text("Prix: " + plat.prix + "€");
        } else {
            console.log("Plat non trouvé.");
        }
    }

    function validateContactForm() {
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var email = $("#email").val();
        var telephone = $("#telephone").val();
        var demande = $("#demande").val();

        if (nom && prenom && email && telephone && demande) {
            return true;
        } else {
            alert("Veuillez remplir tous les champs du formulaire de contact.");
            return false;
        }
    }

    $("#contactForm").submit(function (event) {
        // event.preventDefault();

        if (validateContactForm()) {
            var contactFormData = {
                nom: $("#nom").val(),
                prenom: $("#prenom").val(),
                email: $("#email").val(),
                telephone: $("#telephone").val(),
                demande: $("#demande").val()
            };

            // alert("Formulaire de contact soumis avec succès. Données : " + JSON.stringify(contactFormData));
            // Ajoute ici le code pour envoyer les données du formulaire de contact (contactFormData) à ton serveur PHP si nécessaire.
        } else {
            // alert("Le formulaire de contact n'est pas valide.");
        }
    });

    function validateCommandeForm() {
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var email = $("#email").val();
        var adresse = $("#adresse").val();
        var quantite = $("#quantite").val();

        if (nom && prenom && email && adresse && quantite) {
            return true;
        } else {
            alert("Veuillez remplir tous les champs du formulaire de commande.");
            return false;
        }
    }

    $("#commandeForm").submit(function (event) {
        //event.preventDefault();

        if (validateCommandeForm()) {
            var commandeFormData = {
                nom: $("#nom").val(),
                prenom: $("#prenom").val(),
                email: $("#email").val(),
                adresse: $("#adresse").val(),
                quantite: $("#quantite").val()
            };

            //alert("Formulaire de commande soumis avec succès. Données : " + JSON.stringify(commandeFormData));
            // Ajoute ici le code pour envoyer les données du formulaire de commande (commandeFormData) à ton serveur PHP si nécessaire.
        } else {
            //alert("Le formulaire de commande n'est pas valide.");
        }
    });
