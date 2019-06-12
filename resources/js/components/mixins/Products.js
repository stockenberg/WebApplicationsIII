let products = {
    data: () => {
        return {
            products: null
        };
    },
    methods: {
        loadProducts: function() {
            axios
                .get(`${LARAVEL_API_URL}/products`)
                .then(res => {
                    this.products = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    created: function() {
        this.loadProducts();
    }
};

export default products;
