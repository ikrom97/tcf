import './App.css';
import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import PageWrapper from '../layouts/PageWrapper/PageWrapper';
import { AdminRoute } from '../../const';
import TournamentsPage from '../pages/TournamentsPage/TournamentsPage';
import TournamentsShowPage from '../pages/TournamentsShowPage/TournamentsShowPage';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path={AdminRoute.HOME} element={<PageWrapper />}>
          <Route path={AdminRoute.ADMIN} element={<Navigate to={AdminRoute.TOURNAMENTS} />} />
          <Route path={AdminRoute.TOURNAMENTS} element={<TournamentsPage />} />
          <Route path={AdminRoute.TOURNAMENTS_SINGLE} element={<TournamentsShowPage />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
