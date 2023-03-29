import './App.css';
import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import { AdminRoute, AppRoute } from '../../const';
import NewsPage from '../pages/NewsPage/NewsPage';
import NewsShowPage from '../pages/NewsShowPage/NewsShowPage';
import PageWrapper from '../layouts/page-wrapper';
import TournamentsIndex from '../pages/Tournaments/Index';
import TournamentsCreate from '../pages/tournaments/create';
import TournamentsEdit from '../pages/tournaments/edit';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path={AppRoute.Index} element={<PageWrapper />}>
          <Route path={AppRoute.Admin} element={<Navigate to={AppRoute.Tournaments['index']} />} />

          <Route path={AppRoute.Tournaments['index']} element={<TournamentsIndex />} />
          <Route path={AppRoute.Tournaments['create']} element={<TournamentsCreate />} />
          <Route path={AppRoute.Tournaments['edit']} element={<TournamentsEdit />} />

          <Route path={AdminRoute.NEWS} element={<NewsPage />} />
          <Route path={AdminRoute.NEWS_SINGLE} element={<NewsShowPage />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
