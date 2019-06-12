let products = {
    data: () => {
        return {
            products: null
        };
    },
    methods: {
        load: function() {
            axios
                .get(`${LARAVEL_API_URL}/products`)
                .then(res => {
                    this.products = res.data;
                })
                .catch(this.log);
        },
        destroy: function(id) {
            axios
                .delete(`${LARAVEL_API_URL}/products/${id}`)
                .then(res => {
                    console.log(res);
                    this.load();
                })
                .catch(this.log);
        },
        log: function(err) {
            console.log(err);
        }
    },
    created: function() {
        this.load();
    }
};

export default products;
