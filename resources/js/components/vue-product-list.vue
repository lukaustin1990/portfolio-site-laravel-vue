<script setup>
import { ref, onMounted } from "vue";

const products = ref([]);
const loading = ref(true);
const error = ref(null);

onMounted(async () => {
    try {
        const res = await fetch("/api/products");

        if (!res.ok) {
            throw new Error("Failed to fetch");
        }

        const data = await res.json();
        products.value = data;
    } catch (err) {
        error.value = err.message;
    } finally {
        loading.value = false;
    }
});
</script>
<template>
    <p v-if="loading">Loading...</p>

    <p v-else-if="error">Error: {{ error }}</p>

    <p v-else-if="products.length === 0">Nothing listed</p>

    <div v-else>
        <div
            v-for="product in products"
            :key="`product_card_${product.id}`"
            class="card mb-3"
        >
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-auto">
                        <img
                            :src="
                                product.image ||
                                'https://placehold.co/100?text=No+Image'
                            "
                            :alt="product.name"
                            class="img-fluid"
                            loading="lazy"
                        />
                    </div>

                    <div class="col-12 col-lg">
                        <h2 class="card-title">{{ product.name }}</h2>
                        <div class="row">
                            <div class="col-6 col-lg-auto">
                                <span class="text-muted small">
                                    Product Code: {{ product.product_code }}
                                </span>
                            </div>
                        </div>
                        <span class="text-muted w-100 text-truncate">
                            {{ product.description_short }}
                        </span>
                    </div>

                    <div class="col-12 col-lg-4 text-end">
                        <h3 class="mb-3">
                            £{{ Number(product.price).toFixed(2) }} <span class="fs-6 text-muted">ex. VAT</span>
                        </h3>
                        <div class="btn-group" role="group">
                            <a class="btn btn-outline-secondary" :href="`/products/${product.product_code}`">
                                <i class="fa fa-magnifying-glass"> </i>
                            </a>
                            <button class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i> Add to Basket
                            </button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
