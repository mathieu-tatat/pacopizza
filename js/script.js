document.addEventListener("DOMContentLoaded", (event) => {

    let searchInput =  document.querySelector('#search');
    const ul = document.getElementById('#searchList');
    console.log(ul);

    ////////// autocomplétion de la search bar  ///////////
    searchInput.addEventListener('keyup', () => {
        
        let search = searchInput.value;
        if (search != "") {
           
            let formData = new FormData();
            formData.append("searchPHP",encodeURIComponent(search))
            fetch("controller/recherche.php", {
                method: 'post',
                body: formData
            })
                .then(res => res.json())
                .then(res => {
                    let ul = document.querySelector('.autocom-box')
                    ul.innerHTML="";
                    res.forEach(pizzas=> {
                    /////// création de liste et liens en attribuant une class //////////
                        let barreSearch = document.createElement('a');
                        barreSearch.setAttribute("class","searchLink");
                        let liSearch = document.createElement('li');
                        barreSearch.append(liSearch)     
                    /////////////redirection de chaque liens de la liste       
                        barreSearch.href = "pizza.php?id_pizza="+pizzas.id_pizza ; 
                            href='pizza.php?id_pizza= <?= $value["id_pizza"]?>'
                        barreSearch.innerHTML = pizzas.nom + '</br>' ; 
     
                        ul.append(barreSearch);
                    });

                })
        }
    });
});


