import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import { AppRoute } from '../../../const';
import TournamentsBoard from '../../ui/tournaments-board';

function TournamentsIndex() {
  return (
    <>
      <Typography component="h1" variant="h5">Турниры</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Typography color="text.primary">Турниры</Typography>
      </Breadcrumbs>

      <TournamentsBoard />
    </>
  );
}

export default TournamentsIndex;
