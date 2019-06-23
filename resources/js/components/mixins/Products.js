let products = {
    data: () => {
        return {
            products: null,
            htmlForm: {
                title: {
                    label: "Titel",
                    type: "text",
                    error: null
                },
                description: {
                    label: "Beschreibung",
                    type: "textarea",
                    error: null
                },
                price: {
                    label: "Preis",
                    type: "text",
                    error: null
                },
                image: {
                    label: "Bild",
                    type: "text",
                    error: null
                }
            }
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
            console.log(err.errors);
        },
        store(data) {
            this.htmlForm.title.error = null;
            this.htmlForm.description.error = null;
            this.htmlForm.image.error = null;

            axios
                .post(`${LARAVEL_API_URL}/products`, data)
                .then(res => {
                    this.$toast.success(res.data);
                    this.products = {};
                })
                .catch(err => {
                    for (let key in err.response.data.errors) {
                        this.htmlForm[key].error =
                            err.response.data.errors[key][0];
                    }
                    this.$toast.error(err.response.data.message);
                });
        }
    },
    created: function() {
        this.load();
    }
};

export default products;
