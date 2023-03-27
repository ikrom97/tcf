import './App.css';
import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import PageWrapper from '../layouts/PageWrapper/PageWrapper';
import { AdminRoute } from '../../const';
import TournamentsPage from '../pages/TournamentsPage/TournamentsPage';
import TournamentsShowPage from '../pages/TournamentsShowPage/TournamentsShowPage';
import NewsPage from '../pages/NewsPage/NewsPage';
import NewsShowPage from '../pages/NewsShowPage/NewsShowPage';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path={AdminRoute.HOME} element={<PageWrapper />}>
          <Route path={AdminRoute.ADMIN} element={<Navigate to={AdminRoute.TOURNAMENTS} />} />
          <Route path={AdminRoute.TOURNAMENTS} element={<TournamentsPage />} />
          <Route path={AdminRoute.TOURNAMENTS_SINGLE} element={<TournamentsShowPage />} />

          <Route path={AdminRoute.NEWS} element={<NewsPage />} />
          <Route path={AdminRoute.NEWS_SINGLE} element={<NewsShowPage />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
