const key = "fSREaAUTpMY3MrJi8NYXmGMMEdwg75UBt5UfQNxO6ek3xXOCDr";
const secretKey = "fUBTm6BvlmLS6nqPrr8kZ8kjs1XNG4QqHwXgGsDo";
const validZip = /^\d{5}$/;

let token;
// get the token first
fetch("https://api.petfinder.com/v2/oauth2/token", {
    body: `grant_type=client_credentials&client_id=${key}&client_secret=${secretKey}`,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    method: "POST"
  })
  .then(response => response.json())
  .then(data => {
    token = data.access_token;
  });

// Access the form
const petForm = document.getElementById('pet-form');
// Access error
const error = document.getElementById('error');
// Access results
const results = document.getElementById('results');
// Functions

// Update UI
function updateUI(animalInfo) {
  results.innerHTML = '<div></div>';
  animalInfo.forEach(animal => {
    let image;
    if (animal.photos.length > 0) {
      image = animal.photos[0].medium;
      results.innerHTML += `
        <div class="card m-2 p-3">
          <div class="row">
            <div class="col-sm-6 text-center">
            <img src=${image} class="img-fluid rounded-circle mt-2">
            </div>
            <div class="col-sm-6">
              <h3 class="row-title text-center">${animal.name}</h3>
              <h5 class="row-text text-center">City: ${animal.contact.address.city}</h5>
              <h6 class="row-text text-center">State: ${animal.contact.address.state}</h6>
              <ul class="list-group">
                <li class="list-group-item">Age: ${animal.age}</li>
                <li class="list-group-item">Gender: ${animal.gender}</li>
                <li class="list-group-item">Size: ${animal.size}</li>
                <li class="list-group-item">Email: ${animal.contact.email}</li>
                <li class="list-group-item">Phone: ${animal.contact.phone}</li>
                <li class="list-group-item">Status: ${animal.status}</li>
              </ul>
            </div>
          </div>
          </div>
          <br>
        `
    } else {
      image = "<img src='img/noimgmk.png' border='0' alt='Petfinder Logo, Adopt a homeless pet' />";
      results.innerHTML += `
        <div class="card m-2 p-3">
          <div class="row">
            <div class="col-sm-6 text-center">
            ${image}
            </div>
            <div class="col-sm-6">
              <h3 class="row-title text-center">${animal.name}</h3>
              <h5 class="row-text text-center">City: ${animal.contact.address.city}</h5>
              <h6 class="row-text text-center">State: ${animal.contact.address.state}</h6>
              <ul class="list-group">
                <li class="list-group-item">Age: ${animal.age}</li>
                <li class="list-group-item">Gender: ${animal.gender}</li>
                <li class="list-group-item">Size: ${animal.size}</li>
                <li class="list-group-item">Email: ${animal.contact.email}</li>
                <li class="list-group-item">Phone: ${animal.contact.phone}</li>
              </ul>
            </div>
          </div>
          </div>
          <br>
        `
    };
  });
}


// Fetch animals from the API
function fetchAnimals(animal, zip) {
  // fetch pets
  // get data using the token
  fetch(`https://api.petfinder.com/v2/animals/?type=${animal}&contact.address.postcode=${zip}`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    })
    .then(response => response.json())
    .then(data => {
      updateUI(data.animals);
    });
}

// Add event listener
// check if the zip code is valid
petForm.addEventListener('submit', e => {
  // since we are adding an event listener on a submit event we are adding the preventDefault()
  // to avoid the form from submitting to a backend page
  e.preventDefault();
  // Access user input
  const animal = document.getElementById('animal').value;
  const optsina = document.getElementById("opstina");
  var zip = optsina.options[optsina.selectedIndex].value;
  console.log(zip);


  results.innerHTML = '<div class="small"><iframe src="https://giphy.com/embed/lpOxKH3VWxTPi" width="100px" height="100px" frameBorder="0" class="giphy-embed"></iframe></div>';
  setTimeout(() => {
    fetchAnimals(animal, zip);
  }, 2000);
});