<!-- Recipes template  -->
<script id="recipes-template" type="text/x-handlebars-template">
  <ul class="recipe-list">
  {{#each recipes}}
    <li class="recipe">
      <h2>
        <u>{{this.title}}</u>
      </h2>
      <img   src="{{this.image_url}}" id="food" />
      <h3>
        <u>Publisher:</u>{{this.publisher}}
      </h3>
      <h3>
        <u>Description:</u>
        <a href="{{source_url}}">{{this.source_url}}</a>
      </h3>
      <form action="index.php" method="post">
        <input name="recipe_id" hidden value="{{this.recipe_id}}"/>
        <input name="title" hidden value="{{this.title}}"/>
        <input name="image_url" hidden value="{{this.image_url}}"/>
        <input name="publisher" hidden value="{{this.publisher}}"/>
        <input name="source_url" hidden value="{{this.source_url}}"/>
        <button type="submit" class="btn btn-primary">Favourite</button>
      </form>
    </li>
  {{/each}}

  </ul>
</script>
