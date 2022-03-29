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
        $.getJSON(universityData.root_url + '/wp-json/wp/v2/posts?search=' + this.searchField.val(), 
        posts=>{
        this.resultsDiv.html(`
        <h2 class="search-overlay__section-title">Search Results</h2>
        
        ${posts.length ? '<ul class="link-list min-list">' : '<p>No search matches.</p>'}
        ${posts.map(item => `<li><a href="${item.link}">${item.title.rendered}</a></li>`).join('')}
        ${posts.length ? '</ul>' : ''}
        `);
        });
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
       $("body").addClass("body-no-scroll");
       this.isOverlayOpen = true;
       setTimeout( () => this.searchField.focus(), 301);
   }
   closeOverlay(){
       this.searchOverlay.removeClass("search-overlay--active");
       $("body").removeClass("body-no-scroll");
       this.isOverlayOpen = false;
   }
   keyPressDispatcher(e){
    console.log("this is a test");
    if(e.keyCode == 83 && !this.isOverlayOpen){
    this.openOverlay();
    }
    if(e.keyCode == 27 && this.isOverlayOpen){
        this.closeOverlay();
       }
    }

    

}
export default Search;

