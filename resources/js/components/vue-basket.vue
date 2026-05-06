<script setup>
    import { ref, onMounted } from "vue";
    import { getBasketProducts, removeFromBasket } from "../functions-basket";

    const products = ref([]);
    const loading = ref(true);
    const error = ref(null);

    onMounted(loadBasket);

    async function loadBasket() {
        loading.value = true;
        console.log("Fetching basket products...");
        try {
            products.value = await getBasketProducts();
        } catch (err) {
            error.value = err.message;
        } finally {
            loading.value = false;
        }

        console.log(products.value);

        // Return number of products in the basket (for updating the badge count)
        return products.value.length;
    }

    async function basketRemove(productId) {
        await removeFromBasket(productId);
        // Update the basket products after removing an item
        const updatedProducts = await getBasketProducts();
        products.value = updatedProducts;
    }

    defineExpose({
        loadBasket
    });
</script>
<template>
    <p v-if="loading">Loading...</p>

    <p v-else-if="error">Error: {{ error }}</p>

    <p v-else-if="products.length === 0">Your basket is empty</p>

    <div v-else> 
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col" style="width: 200px;">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="product in products"
                    :key="`basket_product_row_${product.id}`"
                >
                    <td>{{ product.name }}</td>
                    <td>&pound; {{ product.price }}</td>
                    <td>
                        <div class="input-group input-group-sm">
                            <button class="btn btn-outline-secondary btn-sm" disabled><i class="fa fa-minus"></i></button>
                            <input
                                type="number"
                                class="form-control form-control-sm"
                                v-model.number="product.quantity"
                                min="1"
                            />
                            <button class="btn btn-outline-secondary btn-sm" disabled><i class="fa fa-plus"></i></button>
                        </div>
                    </td>
                    <td>&pound; {{ product.price * product.quantity }}</td>
                    <td class="text-end">
                        <button
                            class="btn btn-danger btn-sm"
                            @click="basketRemove(product.id)"
                        >
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>