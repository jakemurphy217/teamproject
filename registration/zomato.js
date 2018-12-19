class Zomato {
  constructor() {
    this.api = 'f34b3e406a6b3fb10e07db48adb87928';
    this.header = {
      method: 'GET',
      headers: {
        'user-key': this.api,
        'Content-Type': 'application/json'
      },
      credentials: 'same-origin'
    };
  }
  async searchAPI(city, categoryID) {

    //category url
    const categoryURL = 'https://developers.zomato.com/api/v2.1/categories';
    //CITY URL
    const cityURL = 'https://developers.zomato.com/api/v2.1/cities?q= £(city)';
    

    //category data
    const categoryInfo = await fetch(categoryURL, this.header);
    const categoryJSON = await categoryInfo.json();
    const categories = await categoryJSON.categories;
    //search city
    const cityInfo = await fetch(cityURL, this.header);
    const cityJSON = await cityInfo.json();
    const cityLocation = await cityJSON.location_suggestions;

    let cityID = 0;

    if (cityLocation.length > 0) {
      cityID = await cityLocation[0].id
    }

    //search restaurant
    const restaurantURL = `https://developers.zomato.com/api/v2.1/search?entity_id=${cityID}&entity_type=city&category=${categoryID}&sort=rating`;
    const restaurantInfo = await fetch(restaurantURL, this.header);
    const restaurantJson = await restaurantInfo.json();
    const restaurants = await restaurantJson.restaurants;

    return {
      categories,
      cityID,
      restaurants
    };


  }
}
class UI {
  constructor() {
    this.loader = document.querySelector('.loader');
    this.resterauntList = document.getElementById('restaurant-list')
  }
  addSelectOptions(categories) {
    const search = document.getElementById('searchCategory');
    let output = `<option value='0' selected>select category</option>`;
    categories.forEach(category => {
      output += `<option value="${category.categories.id}">${category.categories.name}
</option>`
    })
    search.innerHTML = output;
  }
  showFeedback(text) {
    const feedback = document.querySelector('.feedback');
    feedback.classList.add('showItem');
    feedback.innerHTML = `<p>enter values</p>`;
    setTimeout(() => {
      feedback.classList.remove('showItem');
    }, 3000)
  }

  getRestaurants(restaurants) {
   console.log(restaurants[0]);
    if (restaurants.length === 0) {
      this.showFeedback('no catagories in this city')
    } else {
      this.resterauntList.innerHTML = "";
      restaurants.forEach((restaurant) => {
        const {
          photos_url,
          name,
          location: {
            address
          },
          user_rating: {
            aggregate_rating
          },
          cuisines,
          average_cost_for_two: cost,
          menu_url,
          url
        } = restaurant.restaurant;
          console.log("RESTER", restaurant)
   if (true) {
      this.showRestaurant(photos_url, name, address, aggregate_rating, cuisines, cost, menu_url, url);
     
    }
      })

    }
  }

    
    
  showRestaurant(img, name, address, aggregate_rating, cuisines, cost, menu_url, url) {
    
    const div = document.createElement('div');
    div.classList.add('col-11', 'mx-auto', 'my-3', 'col-md-4');

    div.innerHTML = ` <div class="card">
      <div class="card">
       <div class="row p-3">
        <div class="col-5">
         <img src="${img}" class="img-fluid img-thumbnail" alt = "">
        </div>
        <div class="col-5 text-capitalize">
         <h6 class="text-uppercase pt-2 redText">${name}</h6>
         <p>${address}</p>
        </div>
        <div class="col-1">
         <div class="badge badge-success">
          ${aggregate_rating}
         </div>
        </div>
       </div>
       <hr>
       <div class="row py-3 ml-1">
        <div class="col-5 text-uppercase ">
         <p>${cuisines}</p>
         <p>${cost}</p>
        </div>
        <div class="col-7 text-uppercase">
         <p>cousines</p>
         <p>cost</p>
        </div>
       </div>
       <hr>
       <div class="row text-center no-gutters pb-3">
        <div class="col-6">
         <a href="${menu_url}" target="_blank" class="btn redBtn  text-uppercase"><i class="fas fa-book"></i> menu</a>
        </div>
        <div class="col-6">
         <a href="${url}" target="_blank" class="btn redBtn  text-uppercase"><i class="fas fa-book"></i> website</a>
        </div>
       </div>
      </div>`;
    this.resterauntList.appendChild(div);
    console.log(div);
 
  }

}
(function() {
  const searchForm = document.getElementById('searchForm');
  const searchCity = document.getElementById('searchCity');
  const searchCategory = document.getElementById('searchCategory');

  const zomato = new Zomato();

  const ui = new UI();

  //add select options
  document.addEventListener('DOMContentLoaded', () => {
    //logic goes here
    zomato.searchAPI().then(data => ui.addSelectOptions(data.categories));
  });

  //submit form
  searchForm.addEventListener('submit', event => {
    event.preventDefault();

    const city = searchCity.value.toLowerCase();
    const categoryID = parseInt(searchCategory.value);

    if (city === '' || categoryID === 0) {

      ui.showFeedback('please enter a city and select catagory')
    } else {
      //logic goes here
      zomato.searchAPI(city).then(cityData => {
        if (cityData.cityID === 0) {
          ui.showFeedback('please enter a valid city')
        } else {
          
          zomato.searchAPI(city, categoryID).then(data => {
            ui.getRestaurants(data.restaurants);
          });
        }
      });
    }

  })

})();