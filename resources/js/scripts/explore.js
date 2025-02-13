function handleExplore(){
    const explore_menu_link = document.getElementById('explore');

    if(!explore_menu_link){
        return;
    }
    
    explore_menu_link.addEventListener('click', function(event){
        event.preventDefault();
        
        window.scrollTo({ top: 0, behavior: 'smooth' });
    
        setTimeout(() => {
            const searchInput = document.getElementById('search_input');
            searchInput && searchInput.focus();
        }, 250);
    });
}

handleExplore();