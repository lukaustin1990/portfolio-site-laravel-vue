import React from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";

function HomeQuickCards({}) {
    const cards = [];

    for (let i = 0; i < 3; i++) {
        cards.push(
            <div key={`home_quick_card_${i}`} className="card mb-3">
                <div className="card-body">
                    <h5 className="card-title">Card title {i + 1}</h5>
                    <p className="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptate.</p>
                    <a href="#" className="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        );
    }

    return cards;
}