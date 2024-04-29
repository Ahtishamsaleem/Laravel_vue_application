<template>
  <div class="d-flex">
    <v-card class="mx-auto" >
      <v-img height="200px"   src="images/card_facewash.jpg" cover></v-img>
      <v-card-title>Garnier MEN'S FaceWash</v-card-title>
      <v-card-subtitle>Remove Dust and pimple and dark circle and make glow your skin</v-card-subtitle>
      <v-card-actions>
        <v-btn color="orange-lighten-2"  text="Explore" ></v-btn>
        <v-spacer></v-spacer>
        <v-btn :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"  @click="show = !show"  ></v-btn>
      </v-card-actions>
      <v-expand-transition>
        <div v-show="show">
          <v-divider></v-divider>
          <v-card-text>
            I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.
          </v-card-text>
        </div>
      </v-expand-transition>
    </v-card>
    <v-card class="mx-auto">
      <v-img  height="200px" src="images/card_cookingoil.jpeg" cover></v-img>
      <v-card-title>Tullo Cooking Oil</v-card-title>
      <v-card-subtitle>Best For health and maintain your colustrol</v-card-subtitle>
      <v-card-actions>
        <v-btn color="orange-lighten-2"  text="Explore" ></v-btn>
        <v-spacer></v-spacer>
        <v-btn :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"  @click="show = !show"  ></v-btn>
      </v-card-actions>
      <v-expand-transition>
        <div v-show="show">
          <v-divider></v-divider>
          <v-card-text>
            I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.
          </v-card-text>
        </div>
      </v-expand-transition>
    </v-card>
    <v-card class="mx-auto">
      <v-img  height="200px" src="images/card_olpermilk.jpg" cover></v-img>
      <v-card-title>Olper's Milk</v-card-title>
      <v-card-subtitle> Fresh And Cream milk</v-card-subtitle>
      <v-card-actions>
        <v-btn color="orange-lighten-2"  text="Explore" ></v-btn>
        <v-spacer></v-spacer>
        <v-btn :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"  @click="show = !show"  ></v-btn>
      </v-card-actions>
      <v-expand-transition>
        <div v-show="show">
          <v-divider></v-divider>
          <v-card-text>
            I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.
          </v-card-text>
        </div>
      </v-expand-transition>
    </v-card>
    <v-card class="mx-auto">
      <v-img  height="200px" src="images/card_pantene.jpg" cover></v-img>
      <v-card-title>Pantene Shampoo</v-card-title>
      <v-card-subtitle> Make silk black hair and long hairs</v-card-subtitle>
      <v-card-actions>
        <v-btn color="orange-lighten-2"  text="Explore" ></v-btn>
        <v-spacer></v-spacer>
        <v-btn :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"  @click="show = !show"  ></v-btn>
      </v-card-actions>
      <v-expand-transition>
        <div v-show="show">
          <v-divider></v-divider>
          <v-card-text>
            I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.
          </v-card-text>
        </div>
      </v-expand-transition>
    </v-card>
  </div>
  </template>
<script>
export default {
  name:'cards',
}
</script>
<style>



</style>