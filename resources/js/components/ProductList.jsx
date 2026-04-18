import React, { useState, useEffect } from "react";

export default function ProductList({}) {

    const [products, setProducts] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetch("/api/products")
            .then(res => {
                if (!res.ok) {
                    throw new Error("Failed to fetch");
                }
                return res.json();
            })
            .then(data => {
                setProducts(data);
                setLoading(false);
            })
            .catch(err => {
                setError(err.message);
                setLoading(false);
            });
    }, []);

    if (loading) {
        return <p>Loading...</p>;
    }

    if (error) {
        return <p>Error: {error}</p>;
    }

    if (products.length === 0) {
        return <p>Nothing listed</p>;
    }

    const cards = [];

    products.forEach(product => {
        if (!product.image) {
            product.image = "https://placehold.co/100?text=No+Image";
        }
        cards.push(
            <div key={`product_card_${product.id}`} className="card mb-3">
                <div className="card-body">
                    <div className="row">
                        <div className="col-12 col-lg-auto">
                            <img src={product.image} className="img-fluid"/>
                        </div>
                        <div className="col-12 col-lg">
                            <h2 className="card-title">{product.name}</h2>
                            <span className="text-muted w-100 text-truncate">{product.description_short}</span>  
                        </div>
                        <div className="col-12 col-lg-3 text-end">
                            <h3 className="mb-3">&pound;{product.price.toFixed(2)}</h3>
                            <button type="button" className="btn btn-primary w-100">Add to Basket</button>
                        </div>
                    </div>                    
                </div>            
            </div>
        );
    });

    return cards;
}