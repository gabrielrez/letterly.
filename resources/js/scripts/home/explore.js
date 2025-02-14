function handleSearch(){
    const search_menu_link = document.getElementById('search');

    if(!search_menu_link){
        return;
    }
    
    search_menu_link.addEventListener('click', function(event){
        event.preventDefault();
        
        window.scrollTo({ top: 0, behavior: 'smooth' });
    
        setTimeout(() => {
            const searchInput = document.getElementById('search_input');
            searchInput && searchInput.focus();
        }, 250);
    });
}

handleSearch();