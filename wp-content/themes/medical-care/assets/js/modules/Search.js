import $ from 'jquery';
class Search{
   
    constructor(){
        
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".js-search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.searchField = $("#search-term");
    this.typingTimer;
    this.resultsDiv = $("#search-overlay__results");
    this.previousValue;
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.noResult = false;
    
   }

   typingLogic(){
    if(this.searchField.val() != this.previousValue){ // check the search term
        clearTimeout(this.typingTimer);

        if(this.searchField.val()){ // search field is not empty
            if(!this.isSpinnerVisible){
             this.resultsDiv.html('<div class="spinner-loader"></div>');
             this.isSpinnerVisible = true;
             }
             this.typingTimer = setTimeout(this.getResults.bind(this),2000);
             }
             else{ // empty field so clear out HTML div and hide the spinner
             this.resultsDiv.html('');
             this.isSpinnerVisible = false;
             }

        }
        this.previousValue = this.searchField.val(); // collect the text from the search field
        }
    //sends requests to WordPress server
    getResults(){
        this.isSpinnerVisible = false;
        if (this.searchField.val()){
        $.getJSON(universityData.root_url + '/wp-json/wp/v2/posts?search=' + this.searchField.val(), 
        posts=>{
            $.getJSON(universityData.root_url + '/wp-json/wp/v2/staff?search=' + this.searchField.val(), 
            staff=>{
                $.getJSON(universityData.root_url + '/wp-json/wp/v2/event?search=' + this.searchField.val(), 
            event=>{
                $.getJSON(universityData.root_url + '/wp-json/wp/v2/services?search=' + this.searchField.val(), 
            services=>{
                $.getJSON(universityData.root_url + '/wp-json/wp/v2/review?search=' + this.searchField.val(), 
            review=>{
                if(posts.length > 0 || staff.length > 0 || services.length > 0 || event.length > 0 || review.length > 0){

                
        this.resultsDiv.html(`
        <h2 class="search-overlay__section-title">Search Results</h2>
        
        
        
      
        <ul class="link-list min-list">
        ${posts.map(item => `<li><a href="${item.link}">${item.title.rendered}</a></li>`).join('')}
        ${staff.map(item => `<li><a href="${item.link}">${item.title.rendered}</a></li>`).join('')}
        ${event.map(item => `<li><a href="${item.link}">${item.title.rendered}</a></li>`).join('')}
        ${services.map(item => `<li><a href="${item.link}">${item.title.rendered}</a></li>`).join('')}
        ${review.map(item => `<li><a href="${item.link}">${item.title.rendered}</a></li>`).join('')}
       
        </ul>
        `);
                }
                else{
                    
                    this.resultsDiv.html(`
                        <h2 class="search-overlay__section-title">Search Results</h2>
                 
                        <ul class="link-list min-list">No Results</ul>
                   
                        `);
                }
        });
    
    });
});
});
});


        }
        else{
            this.resultsDiv.html('');
            this.isSpinnerVisible = false;
        }
    
        }

   events(){
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    $(document).on("keydown", this.keyPressDispatcher.bind(this));
    this.searchField.on("keyup", this.typingLogic.bind(this));
    this.searchField.on("click", 
    this.openOverlay.bind(this));
 
    }
   
   openOverlay(){
       this.searchOverlay.addClass("search-overlay--active");
      // $("body").addClass("body-no-scroll");
       this.isOverlayOpen = true;
   }
   closeOverlay(){
       this.searchOverlay.removeClass("search-overlay--active");
      // $("body").removeClass("body-no-scroll");
       this.isOverlayOpen = false;
   }
   keyPressDispatcher(e){
    if(e.keyCode == 83 && !this.isOverlayOpen){
    this.openOverlay();
    }
    if(e.keyCode == 27 && this.isOverlayOpen){
        this.closeOverlay();
       }
    }

    

}

export default Search;



 