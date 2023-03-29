import './App.css';
import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import { AppRoute } from '../../const';
import PageWrapper from '../layouts/page-wrapper';
import TournamentsIndex from '../pages/Tournaments/Index';
import TournamentsCreate from '../pages/tournaments/create';
import TournamentsEdit from '../pages/tournaments/edit';
import NewsIndex from '../pages/news';
import NewsCreate from '../pages/news/create';
import NewsEdit from '../pages/news/edit';
import ArticlesIndex from '../pages/articles';
import ArticlesCreate from '../pages/articles/create';
import ArticlesEdit from '../pages/articles/edit';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path={AppRoute.Index} element={<PageWrapper />}>
          <Route path={AppRoute.Admin} element={<Navigate to={AppRoute.Tournaments['index']} />} />

          <Route path={AppRoute.Tournaments['index']} element={<TournamentsIndex />} />
          <Route path={AppRoute.Tournaments['create']} element={<TournamentsCreate />} />
          <Route path={AppRoute.Tournaments['edit']} element={<TournamentsEdit />} />

          <Route path={AppRoute.News['index']} element={<NewsIndex />} />
          <Route path={AppRoute.News['create']} element={<NewsCreate />} />
          <Route path={AppRoute.News['edit']} element={<NewsEdit />} />

          <Route path={AppRoute.Articles['index']} element={<ArticlesIndex />} />
          <Route path={AppRoute.Articles['create']} element={<ArticlesCreate />} />
          <Route path={AppRoute.Articles['edit']} element={<ArticlesEdit />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
