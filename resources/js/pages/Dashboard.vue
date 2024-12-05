<script>
export default {
    data() {
        return {
            id: '',
            name: ''
        }
    },
    mounted() {
        const token = localStorage.getItem('token');
        axios
            .get('/api/user', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then((response) => {
                this.id = response.data.id
                this.name = response.data.name
            })
            .catch((error) => {
                console.log('Unauthorized: Invalid token');
            });
    },
    methods: {
        logout() {
            this.$emit('updateSideBar');

            axios
                .get('/api/logout')
                .then((response) => {
                    localStorage.removeItem('authenticated');
                    this.$router.push({ name: 'Login' });
                })
                .catch((error) => {
                    console.log('Error logging out:', error);
                });
        }
    }
}
</script>

<template>
    <div id="backend-view">
        <div class="logout"><a href="#" @click="logout">Log out</a></div>
        <h1 class="heading">Dashboard</h1>
        <span>Hi {{ name }} !</span>
        <div class="links">
            <ul>
                <li><a href="">Create Post</a></li>

                <li><router-link :to="{ name: 'CreateCategories' }">Create Category</router-link></li>
                <li><router-link :to="{ name: 'CategoriesList' }">Categories List</router-link></li>
            </ul>
        </div>
    </div>
</template>

<style scoped>
/* dashboard */
#backend-view {
    text-align: center;
    height: 100vh;
    padding-top: 15vh;
}

.logout {
    position: absolute;
    top: 30px;
    right: 40px;
}

.heading {
    margin-bottom: 5px;
}

.links {
    margin-top: 30px;
    margin-left: auto;
    margin-right: auto;
    background: #ffffff;
    max-width: 500px;
    padding: 15px;
    border-radius: 15px;
}

.links ul {
    list-style: none;
}

.links a {
    all: revert;
    font-size: 26px;
    display: inline-block;
    margin: 10px 0;
    color: black;
}
</style>
