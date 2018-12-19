// Get html elements
var formElement = document.querySelector('.form')
var inputElement = document.querySelector('.post-id-input')
var outputElement = document.querySelector('.output')

// Helper function to generate a handlebars template
// into a html string
function getTemplateHTML(templateId, data) {
    var source = document.getElementById(templateId).innerHTML;
    var template = Handlebars.compile(source);
    return template(data)
}

// Callback function that gets executed
// everytime the form gets submitted
function onSubmit(event) {
    // prevent the form from submitting data to a server
    event.preventDefault()

    // get the current value of the input element
    var postId = inputElement.value

    outputElement.innerHTML = "Loading..."

    // Send a get request to an api
    axios.get('https://www.food2fork.com/api/search?key=540fb1eebf93a007ff40544ea6179e66&q=' + postId + '&page=2')
        .then(function (response) {
            // Store the response from the api
        console.log(response)
            var recipes = response.data.recipes
            // generate the html template
            var templateContext = {
                recipes: recipes
            }



            var html = getTemplateHTML('recipes-template', templateContext)

            // write html to the page
            outputElement.innerHTML = html
            console.log(recipes)

        })
        .catch(function (err) {
            // Catch any errors
            outputElement.innerHTML = "Unable to get posts. Check console for error message"
            console.log(err);
        })
}

formElement.addEventListener('submit', onSubmit)
