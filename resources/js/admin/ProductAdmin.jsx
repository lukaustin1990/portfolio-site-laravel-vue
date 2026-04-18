import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import "bootstrap/dist/css/bootstrap.min.css";

function ProductAdmin() {
    const [products, setProducts] = useState([]); // List of all products
    const [form, setForm] = useState({
        name: "",
        description_short: "",
        description_long: "",
        price: "",
        image: ""
    }); // Form data for add/edit
    const [editingId, setEditingId] = useState(null); // Null = adding new product, otherwise editing

    // Load products on page load
    useEffect(() => {
        fetchProducts();
    }, []);

    // Fetch all products
    const fetchProducts = async () => {
        const res = await fetch("/api/products");
        const data = await res.json();
        setProducts(data);
    };

    // Update form fields

    const handleChange = function (e) {
        const fieldName = e.target.name; 
        const fieldValue = e.target.value; // what the user typed

        const updatedForm = { ...form };   // copy all current fields
        updatedForm[fieldName] = fieldValue; // update only the one field

        setForm(updatedForm);  // save back to state
    }      

    // Submit form (add or update)
    const handleSubmit = async (e) => {
        e.preventDefault();

        const url = editingId ? `/api/products/${editingId}` : "/api/products";
        const method = editingId ? "PUT" : "POST";

        const res = await fetch(url, {
            method,
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(form)
        });
        const savedProduct = await res.json();

        // Reset form
        setForm({ name: "", description_short: "", description_long: "", price: "", image: "" });
        setEditingId(null);

        // Update products list
        setProducts(prev => {
            // Replace updated product or add new one
            const filtered = prev.filter(p => p.id !== savedProduct.id);
            return [...filtered, savedProduct];
        });
    };

    // Start editing a product
    const handleEdit = (product) => {
        setForm(product);
        setEditingId(product.id);
    };

    // Delete a product
    const handleDelete = async (id) => {
        await fetch(`/api/products/${id}`, { method: 'DELETE' });
        setProducts(prev => prev.filter(p => p.id !== id));
    };

    return (
        <div className="container mt-5">
            <h2>Product Admin</h2>
            <form onSubmit={handleSubmit} className="mb-4">
                <input name="name" value={form.name} onChange={handleChange} placeholder="Name" className="form-control mb-2"/>
                <input name="description_short" value={form.description_short} onChange={handleChange} placeholder="Short Description" className="form-control mb-2"/>
                <textarea name="description_long" value={form.description_long} onChange={handleChange} placeholder="Long Description" className="form-control mb-2"/>
                <input name="price" value={form.price} onChange={handleChange} placeholder="Price" type="number" step="0.01" className="form-control mb-2"/>
                <input name="image" value={form.image} onChange={handleChange} placeholder="Image URL" className="form-control mb-2"/>
                <button type="submit" className="btn btn-primary">{editingId ? 'Update' : 'Add'} Product</button>
            </form>

            <table className="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Short</th>
                        <th>Long</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {products.map(p => (
                        <tr key={p.id}>
                            <td>{p.name}</td>
                            <td>{p.description_short}</td>
                            <td>{p.description_long}</td>
                            <td>{p.price}</td>
                            <td>{p.image}</td>
                            <td>
                                <button onClick={() => handleEdit(p)} className="btn btn-sm btn-warning me-2">Edit</button>
                                <button onClick={() => handleDelete(p.id)} className="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}

// Mount React component
const container = document.getElementById("products_admin_list");
if(container){
    createRoot(container).render(<ProductAdmin />);
}