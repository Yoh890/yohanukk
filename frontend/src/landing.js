import React from "react";
import { Link } from "react-router-dom";
import "./landing.css"; // Create a separate CSS file for custom styles

const Index = () => {
  return (
    <div className="container-fluid">
      <header className="text-center py-5">
        <h1 className="display-4">Welcome to Galleryo</h1>
        <p className="lead">Discover and showcase beautiful artworks</p>
        <Link to="/picture" className="btn btn-primary btn-lg">
          Explore Gallery
        </Link>
      </header>

      <section className="features my-5">
        <div className="row text-center">
          <div className="col-lg-4 mb-4">
            <i className="fas fa-image fa-4x mb-4"></i>
            <h3 className="h4">Beautiful Images</h3>
            <p>Explore a curated collection of stunning visual artworks.</p>
          </div>
          <div className="col-lg-4 mb-4">
            <i className="fas fa-users fa-4x mb-4"></i>
            <h3 className="h4">Community</h3>
            <p>
              Connect with other art enthusiasts and artists in our community.
            </p>
          </div>
          <div className="col-lg-4 mb-4">
            <i className="fas fa-heart fa-4x mb-4"></i>
            <h3 className="h4">Favorites</h3>
            <p>Save your favorite artworks and create your own gallery.</p>
          </div>
        </div>
      </section>

      <section className="cta text-center py-5">
        <h2 className="h1">Start Exploring Art Today</h2>
        <Link to="/gallery" className="btn btn-primary btn-lg mt-3">
          Get Started
        </Link>
      </section>
    </div>
  );
};

export default Index;
