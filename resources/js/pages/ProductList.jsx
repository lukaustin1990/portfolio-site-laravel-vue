import React from "react";
import { createRoot } from "react-dom/client";
import ProductList from "../components/ProductList";
import {$} from "jquery";

$(document).ready(function () {
    const container = document.getElementById('product-list');

    if (container) {
        createRoot(container).render(<ProductList />);
    }
})