  <template>
<v-card color="grey-lighten" height="100px" rounded="0" flat>
    <v-toolbar density="compact">
        <v-app-bar-nav-icon></v-app-bar-nav-icon>
        <v-toolbar-title>ShoppingOnline</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-item>
            <div class="d-flex justify-space-around">

                <v-menu transition="scale-transition">
                    <template v-slot:activator="{ props }">
                        <v-btn color="info" v-bind="props">
                            Home
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item>
                            <v-list-item-title>Home1</v-list-item-title>
                            <v-list-item-title>Home2</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>

                <v-menu transition="scale-transition">
                    <template v-slot:activator="{ props }">
                        <v-btn color="primary" v-bind="props">
                            Product
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item class="d-flex justify-space-around">
                            <v-list-item-avatar><img src="/images/product_mobile.jpeg" alt="mobile"></v-list-item-avatar>
                            <v-list-item-title>Mobiles</v-list-item-title>
                            <v-list-item-avatar><img src="/images/product_mobile_access.jpeg" alt="mobile"></v-list-item-avatar>
                            <v-list-item-title>Mobile Accessories</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>

                <v-menu transition="scale-transition">
                    <template v-slot:activator="{ props }">
                        <v-btn color="secondary" v-bind="props">
                            Catergory
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item>
                            <v-list-item-title>Cat1</v-list-item-title>
                            <v-list-item-title>Cat2</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>

                <v-menu transition="scale-transition">
                    <template v-slot:activator="{ props }">
                        <v-btn color="warning" v-bind="props">
                            Discount Items
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item>
                            <v-list-item-title>Item1</v-list-item-title>
                            <v-list-item-title>Item2</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>
                <v-menu transition="scale-transition">
                    <template v-slot:activator="{ props }">
                        <v-btn color="dark" v-bind="props">
                            Freights
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item>
                            <v-list-item-title>Internationl</v-list-item-title>
                            <v-list-item-title>National</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>

            </div>

        </v-toolbar-item>

        <v-btn icon>
            <v-icon>mdi-magnify</v-icon>
        </v-btn>

        <v-btn icon>
            <v-icon>mdi-heart</v-icon>
        </v-btn>

        <v-menu :location="location">
            <template v-slot:activator="{ props }">
                <v-btn icon dark v-bind="props">
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
            </template>

            <v-list>
                <v-list-item v-for="(item, index) in items" :key="index">
                  <v-switch v-if="index === 0" v-model="message" color="purple" label="Switch Mode" hide-details></v-switch>
                  <v-list-item-title>{{ item.title }}</v-list-item-title>
                  <v-btn v-if="item.buttonText === 'View Profile'" :to="'/updateprofile'" icon="mdi-account" size="x-small" ></v-btn>
                  <v-btn v-if="item.buttonText === 'Change Password'" :to="'/change_password'" >{{ item.buttonText }}</v-btn>
                  <v-btn v-if="item.buttonText === 'Sign Out'" @click="signOut">{{ item.buttonText }}</v-btn>
                </v-list-item>
            </v-list>
        </v-menu>

    </v-toolbar>
</v-card>
</template>

<style>
img {
    width: 50%;
    width: 50%;
}
</style>

<script>
import axios from 'axios';
import router from '@/router'; 

export default {
    name: 'header',
    data: () => ({
        items: [
            {
                switchEnabled: false,
                hasImage: false, 
            },
            {
                buttonText: 'View Profile',
            },
            {
                buttonText: 'Change Password',
            },
            {
                buttonText: 'Sign Out',
            }
        ],
    }),
    methods: {
    signOut() {
      const token = localStorage.getItem('authToken');
      if (token) {
        const config = {
          headers: { Authorization: `Bearer ${token}` }
        };
        axios.post('http://localhost:8000/api/user/logout', null, config)
          .then(() => {
            localStorage.removeItem('authToken');
            router.push('/');
          })
          .catch(error => {
            console.error('Error signing out:', error);
          });
      } else {
        console.error('Token not found. User is not authenticated.');
      }
    }
  }
}
</script>
