import { AppBar, Box, Container, Toolbar, Typography } from '@mui/material'
import { Outlet } from 'react-router';
import PageNavigation from './page-navigation';

function PageWrapper() {
  return (
    <>
      <AppBar position="sticky">
        <Toolbar>
          <Typography variant="h6" component="h1">
            Админ панель ФШТ (Федерация шахмат Таджикистана)
          </Typography>
        </Toolbar>
      </AppBar>

      <Box sx={{
        display: 'flex',
        flexGrow: '1',
        backgroundColor: 'rgba(0, 0, 0, 0.1)',
      }}>
        <PageNavigation />
        <Container
          disableGutters
          maxWidth="lg"
          sx={{ m: 2, }}
        >
          <Outlet />
        </Container>
      </Box>
    </>
  );
}

export default PageWrapper;
